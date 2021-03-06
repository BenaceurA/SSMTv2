<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\jobController;
use App\Http\Controllers\internshipController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\spontaneousController;
use App\Http\Controllers\jobAdminController;
use App\Http\Controllers\internshipAdminController;
use App\Http\Controllers\spontaneousAdminController;
use App\Http\Controllers\settingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', [Controller::class, 'main']);

Route::post('/search', [Controller::class, 'search']);

Route::get('/formulaireEmploi/{id}', [jobController::class, 'JobForm']);

Route::get('/formulaireStage/{id}', [internshipController::class, 'InternshipForm']);

Route::get('/cs/Emploi', [spontaneousController::class, 'SpontaneousJobForm']);

Route::get('/cs/Stage', [spontaneousController::class, 'SpontaneousInternshipForm']);

Route::view('/about', 'about');

Route::view('/map', 'map');
//admin routes

Route::get('/admin', function () {
    return redirect('/BDemploi');
})->middleware("auth");

Route::get('/login', [adminController::class, 'login'])->name("login")->middleware("guest");

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware("auth");

Route::post('/auth', [adminController::class, 'auth']);

Route::get('/createJob', [jobAdminController::class, 'jobCreationIndex'])->middleware("auth");

Route::get('/createInternship', [internshipAdminController::class, 'internshipCreationIndex'])->middleware("auth");

Route::get('/BDemploi', [jobAdminController::class, 'jobApplicationsIndex'])->middleware(["auth"]);

Route::get('/BDstage', [internshipAdminController::class, 'internshipApplicationsIndex'])->middleware(["auth"]);

Route::get('/BDspontaneous', [spontaneousAdminController::class, 'spontaneousApplicationsIndex'])->middleware(["auth"]);

Route::get('/settings', [settingsController::class, 'settingsIndex'])->middleware("auth");

Route::post('/addUser', [settingsController::class, 'addUser']);

Route::post('/modifyPassword', [settingsController::class, 'modifyPassword']);

Route::get('forgotPassword', [adminController::class, 'getForgotPassword']);

Route::post('forgotPassword', [adminController::class, 'postForgotPassword'])->middleware('guest')->name('password.email');

Route::get("resetPassword/{token}", [adminController::class, 'getResetPassword'])->middleware('guest')->name('password.reset');

Route::post("resetPassword", [adminController::class, 'postResetPassword'])->middleware('guest')->name('password.update');
