<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\jobAdminController;
use App\Models\User;
use App\Models\User_Permissions;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class adminController extends Controller
{
    function login()
    {
        return view("/admin/login");
    }

    function getForgotPassword()
    {
        return view("/admin/forgotPassword");
    }

    function getResetPassword($token)
    {
        return view('/admin/resetPasswordForm', ['token' => $token]);
    }

    function postResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    function postForgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    function auth(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials, ($request->remember == "true" ? true : false))) {
            $request->session()->regenerate();
            return redirect()->action([jobAdminController::class, 'jobApplicationsIndex']);
        }

        return back()->withErrors([
            'email' => "Les informations d'identification fournies ne correspondent pas.",
        ]);
    }
    static function getUsername()
    {
        return  DB::table('users')->where('id', Auth::id())->first()->name;
    }
    function getPermissions($id)
    {
        $permissions = DB::table("user_permissions")->where('user_id', $id)->first();
        return json_encode($permissions);
    }
}
