<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Permissions;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class settingsController extends Controller
{
    function settingsIndex()
    {
        $id = Auth::id();

        $add_user_perm = DB::table("user_permissions")->where('user_id', $id)->first('AU')->AU;
        $delete_user_perm = DB::table("user_permissions")->where('user_id', $id)->first('DU')->DU;

        $users = DB::table("users")->get(['id', 'name', 'email', 'created_at'])->all();
        return view("/admin/paramètres/settingsIndex", [
            "view" => "settings",
            "add_user_perm" => $add_user_perm,
            "delete_user_perm" => $delete_user_perm,
            "users" => $users,
            "username" => adminController::getUsername()
        ]);
    }
    function addUser(Request $request)
    {
        $data = $request->input();

        //extract user info
        $name = $data["Username"];
        $password = $data["Password"];
        $email = $data["Email"];
        $confirmEmail = $data["Confirm_Email"];
        //extract permissions
        array_splice($data, 0, 5);
        $permission = $data;

        //check if the user already exists return with error
        if (DB::table("users")->where('name', $name)->first()) {
            return back()->withErrors([
                'addusererror' => "Le nom d'utilisateur existe déjà",
            ]);
        }

        if (DB::table("users")->where('email', $email)->first()) {
            return back()->withErrors([
                'addusererror' => "L'email existe déjà",
            ]);
        }

        if ($email != $confirmEmail) {
            return back()->withErrors([
                'addusererror' => "L'email n'est pas confirmer",
            ]);
        }

        //insert the user

        $user = new User;
        $user->name = $name;
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->email = $email;
        $user->save();

        //insert the user permissions
        $user_permissions = new User_Permissions;
        $user_permissions->user_id = $user->id;
        foreach ($permission as $key => $value) {
            $user_permissions->$key = 1;
        }
        $user_permissions->save();
        return back()->with(["success" => "L'utilisateur a été ajouté"]);
    }

    function modifyPassword(Request $request)
    {
        $data = $request->all();
        $currentPassword = $data["currentPassword"];
        $newPassword = $data["newPassword"];
        $confirmPassword = $data["confirmPassword"];

        if ($confirmPassword != $newPassword) {
            return back()->withErrors([
                'pwderror' => 'confirmer votre mot de passe',
            ]);
        }

        if (!Hash::check($currentPassword, DB::table('users')->where('id', Auth::id())->first()->password)) {
            return back()->withErrors([
                'pwderror' => 'le mot de passe actuelle n\'est pas correct',
            ]);
        }

        //change password
        DB::table('users')->where('id', Auth::id())->update(['password' => Hash::make($newPassword)]);
        return back()->withErrors([
            'pwdsuccess' => 'votre mot de passe a été changé',
        ]);
    }

    function deleteUser($id)
    {
        $exception = DB::transaction(function () use ($id) {
            User_Permissions::destroy(User_Permissions::where("user_id", $id)->first()->id);
            return User::destroy($id);
        }, 5);
        return $exception === 1;
    }
}
