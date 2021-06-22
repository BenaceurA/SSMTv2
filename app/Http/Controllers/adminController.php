<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

            return redirect()->intended('jobs');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match.',
        ]);
    }
}
