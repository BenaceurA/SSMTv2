<?php

use App\Http\Controllers\adminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobController;
use App\Http\Controllers\jobAdminController;
use App\Http\Controllers\settingsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/postemploi', [jobController::class, 'postEmploi']);

Route::post('/createJobOffer', [jobAdminController::class, 'createJobOffer']);

Route::post('/deleteJobApplications', [jobAdminController::class, 'deleteJobApplications']);

Route::post('/activateJobs', [jobAdminController::class, 'activateJobOffers']);

Route::post('/deleteJobs', [jobAdminController::class, 'deleteJobOffers']);

Route::get('/DownloadCVs', [jobAdminController::class, 'downloadCVs']);

Route::get('/DownloadLetters', [jobAdminController::class, 'downloadLetters']);

Route::post('/addUser', [settingsController::class, 'addUser']);
