<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Permissions;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class settingsController extends Controller
{
    function settingsIndex()
    {
        $id = Auth::id();

        $add_user_perm = DB::table("user_permissions")->where('user_id', $id)->first('AU')->AU;
        return view("/admin/paramètres/settingsIndex", ["view" => "settings", "add_user_perm" => $add_user_perm]);
    }
    function addUser(Request $request)
    {
        $data = $request->input();

        //extract user info
        $name = $data["Username"];
        $password = $data["Password"];

        //extract permissions
        array_splice($data, 0, 2);
        $permission = $data;

        //insert the user
        $user = new User;
        $user->name = $name;
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->save();

        //insert the user permissions
        $user_permissions = new User_Permissions;
        $user_permissions->user_id = $user->id;
        foreach ($permission as $key => $value) {
            $user_permissions->$key = 1;
        }
        $user_permissions->save();
    }
}
