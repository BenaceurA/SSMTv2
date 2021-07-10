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
        return view("/admin/paramètres/settingsIndex", ["view" => "settings", "add_user_perm" => $add_user_perm, "username" => adminController::getUsername()]);
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
                'addusererror' => 'le nom existe deja',
            ]);
        }

        if ($email != $confirmEmail) {
            return back()->withErrors([
                'addusererror' => 'L\'email n\'est pas confirmer',
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
        return back();
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
}
