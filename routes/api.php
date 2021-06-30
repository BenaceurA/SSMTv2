<?php

use App\Http\Controllers\adminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobController;
use App\Http\Controllers\jobAdminController;
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

Route::put('/updateJobOffer', [jobAdminController::class, 'updateJobOffer']);

Route::delete('/deleteJobApplications', [jobAdminController::class, 'deleteJobApplications']);

Route::post('/activateJobs', [jobAdminController::class, 'activateJobOffers']);

Route::delete('/deleteJobs', [jobAdminController::class, 'deleteJobOffers']);

Route::get('/DownloadCVs', [jobAdminController::class, 'downloadCVs']);

Route::get('/DownloadLetters', [jobAdminController::class, 'downloadLetters']);

Route::get('/getPermissions', [adminController::class, 'getPermissions']);
