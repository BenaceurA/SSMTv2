<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\jobAdminController;

class adminController extends Controller
{
    function login()
    {
        return view("/admin/login");
    }
    function auth(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, false/*$request->remember*/)) {
            $request->session()->regenerate();
            return redirect()->action([jobAdminController::class, 'jobApplicationsIndex']);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match.',
        ]);
    }
    static function getUsername()
    {
        return  DB::table('users')->where('id', Auth::id())->first()->name;
    }
    function getPermissions(Request $request)
    {
        $userId = Auth::id();
        $permissions = DB::table("user_permissions")->where('user_id', $userId)->first();
        return json_encode($permissions);
    }
}
