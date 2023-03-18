<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Client\ClientController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\EventsFaqTncController;

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


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('validateJsonRequest')->group(function () {
//    Route::post('create_client',[ClientController::class,'create'])->name('client.create');
    Route::post('test',[UserController::class,'test'])->name('user.test');
    Route::post('create_user', [UserController::class,'create'])->name('user.create');
    Route::post('landingPageView', [EventsController::class, 'renderLandingPageApi'])->name('landingPage');

});

Route::post('getEventLandingPageDetail', [EventsController::class, 'getEventLandingPageDetail'])->name('getEventLandingPageDetail');
Route::post('getRegistrationPageDetail', [EventsController::class, 'getRegistrationPageDetail'])->name('getRegistrationPageDetail');

Route::post('landingPageViewApi', [EventsController::class, 'renderLandingPageApi'])->name('landingPageApi');
Route::get('landingPageViewApi1', [EventsController::class, 'renderLandingPageApi'])->name('landingPageApi1');

Route::post('faqAndTnc', [EventsFaqTncController::class, 'index'])->name('events.faqtnc.get');

Route::post('validateCouponCode', [EventsController::class, 'validateCouponCode'])->name('validateCouponCode');
Route::post('validateReferralCode', [EventsController::class, 'validateReferralCode'])->name('validateReferralCode');
Route::post('getEventIdFromSlug', [EventsController::class, 'getEventIdFromSlug'])->name('getEventIdFromSlug');
Route::post('getAllTeams', [EventsController::class, 'getAllTeams'])->name('getAllTeams');
Route::post('createNewTeam', [EventsController::class, 'createNewTeam'])->name('createNewTeam');
Route::post('validateTeam', [EventsController::class, 'validateTeam'])->name('validateTeam');
Route::post('calculatePrice', [EventsController::class, 'calculatePrice'])->name('calculatePrice');
Route::post('getExistingUserData', [UserController::class, 'getExistingUserData'])->name('getExistingUserData');
Route::post('storeUserData', [UserController::class, 'storeUserData'])->name('storeUserData');

// Route::post('landingPageViewApi', [EventsController::class, 'renderLandingPageApi'])->name('landingPageApi');
