<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\jobController;
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobAdminController;

Route::get('/', [Controller::class, 'main']);

Route::post('/search', [Controller::class, 'search']);

Route::get('/formulaireEmploi/{id}', [jobController::class, 'JobForm']);

//admin routes

Route::get('/login', [adminController::class, 'login'])->name("login")->middleware("guest");

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->middleware("auth");

Route::post('/auth', [adminController::class, 'auth']);

Route::get('/create', [jobAdminController::class, 'jobCreationIndex'])->middleware("auth");

Route::get('/jobs', [jobAdminController::class, 'jobApplicationsIndex'])->middleware("auth");
