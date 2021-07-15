<?php

use App\Http\Controllers\adminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\jobAdminController;
use App\Http\Controllers\internshipAdminController;
use App\Http\Controllers\internshipController;
use App\Http\Controllers\spontaneousController;
use App\Http\Controllers\spontaneousAdminController;
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

Route::get('/DownloadJobCVs', [jobAdminController::class, 'downloadCVs']);

Route::get('/DownloadJobLetters', [jobAdminController::class, 'downloadLetters']);

Route::get('/jobDescription', [jobAdminController::class, 'jobDescription']);

Route::get('/jobApplicationExists/{id}', [jobAdminController::class, 'applicationExists']);

Route::get('/jobOfferExists/{id}', [jobAdminController::class, 'offerExists']);

//--------------------------------------------------------------------------

Route::post('/poststage', [internshipController::class, 'postStage']);

Route::post('/createInternshipOffer', [internshipAdminController::class, 'createInternshipOffer']);

Route::put('/updateInternshipOffer', [internshipAdminController::class, 'updateInternshipOffer']);

Route::delete('/deleteInternshipApplications', [InternshipAdminController::class, 'deleteInternshipApplications']);

Route::post('/activateInternships', [internshipAdminController::class, 'activateInternshipOffers']);

Route::delete('/deleteInternships', [internshipAdminController::class, 'deleteInternshipOffers']);

Route::get('/DownloadInternshipCVs', [internshipAdminController::class, 'downloadCVs']);

Route::get('/DownloadInternshipLetters', [internshipAdminController::class, 'downloadLetters']);

Route::get('/InternshipDescription', [internshipAdminController::class, 'InternshipDescription']);

Route::get('/internshipApplicationExists/{id}', [internshipAdminController::class, 'applicationExists']);

Route::get('/internshipOfferExists/{id}', [internshipAdminController::class, 'offerExists']);

//--------------------------------------------------------------------------

Route::post('/postSpontaneous', [spontaneousController::class, 'postSpontaneous']);

Route::delete('/deleteSpontaneousApplications', [spontaneousAdminController::class, 'deleteSpontaneousApplications']);

Route::get('/DownloadSpontaneousCVs', [spontaneousAdminController::class, 'downloadCVs']);

Route::get('/DownloadSpontaneousLetters', [spontaneousAdminController::class, 'downloadLetters']);

Route::get('/spontaneousApplicationExists/{id}', [spontaneousAdminController::class, 'applicationExists']);

//--------------------------------------------------------------------------

Route::get('/getPermissions/{id}', [adminController::class, 'getPermissions']);

Route::delete('/deleteUser/{id}', [settingsController::class, 'deleteUser']);
