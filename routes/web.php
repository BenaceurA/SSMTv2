<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\jobController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\jobAdminController;
use App\Http\Controllers\settingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [Controller::class, 'main']);

Route::post('/search', [Controller::class, 'search']);

Route::get('/formulaireEmploi/{id}', [jobController::class, 'JobForm']);

//admin routes

Route::get('/email/verify', function () {
    return view('admin/verify-email-notice');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/jobs');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/login', [adminController::class, 'login'])->name("login")->middleware("guest");

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->middleware("auth");

Route::post('/auth', [adminController::class, 'auth']);

Route::get('/create', [jobAdminController::class, 'jobCreationIndex'])->middleware("auth");

Route::get('/jobs', [jobAdminController::class, 'jobApplicationsIndex'])->middleware(["auth"]);

Route::get('/settings', [settingsController::class, 'settingsIndex'])->middleware("auth");
