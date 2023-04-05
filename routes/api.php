<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Client\ClientController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\EventsFaqTncController;
use App\Http\Controllers\Api\EventAchievementsController;

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
Route::post('getCheckoutRewards', [EventsController::class, 'getCheckoutRewards'])->name('getCheckoutRewards');
Route::post('processFreeRegistration', [EventsController::class, 'processFreeRegistration'])->name('processFreeRegistration');
Route::post('processPaidRegistration', [EventsController::class, 'processPaidRegistration'])->name('processPaidRegistration');
Route::post('updatePayment', [EventsController::class, 'updatePayment'])->name('updatePayment');
Route::post('getEventData', [EventsController::class, 'getEventData'])->name('getEventData');
Route::post('checkEventUser', [EventsController::class, 'checkEventUser'])->name('checkEventUser');
Route::post('getTermConditions', [EventsController::class, 'getTermConditions'])->name('getTermConditions');
Route::post('getEventReferralData', [EventsController::class, 'getReferralData'])->name('getReferralData');

Route::post('getEventUserData', [EventsController::class, 'getEventUserData'])->name('getEventUserData');

Route::post('getEventSuccessPage', [EventsController::class, 'getEventSuccessPage'])->name('getEventSuccessPage');

Route::post('getEventSocialData', [EventsController::class, 'getEventSocial'])->name('getEventSocial');

Route::post('getUserPaymentHistoryData', [UserController::class, 'getUserPaymentHistory'])->name('getUserPaymentHistory');

Route::post('updateUserTeam', [EventsController::class, 'updateUserTeam'])->name('updateUserTeam');

Route::post('getEventUserCount', [EventsController::class, 'eventUsersCount'])->name('eventUsersCount');

Route::post('getUserRegistrationPayment', [EventsController::class, 'getUserRegistrationPayment'])->name('getUserRegistrationPayment');

Route::post('getEventAchievementsData', [EventAchievementsController::class, 'index'])->name('getEventAchievementsData');

// Route::post('landingPageViewApi', [EventsController::class, 'renderLandingPageApi'])->name('landingPageApi');

Route::post('getUserUpgradePayment', [EventsController::class, 'getUserUpgradePayment'])->name('getUserUpgradePayment');
Route::post('processUpgradeEventPayment', [EventsController::class, 'processUpgradeEventPayment'])->name('processUpgradeEventPayment');
Route::post('updateUpgradeEventPayment', [EventsController::class, 'updateUpgradeEventPayment'])->name('updateUpgradeEventPayment');
Route::post('getEventRewardQuantity', [EventsController::class, 'getEventRewardQuantity'])->name('getEventRewardQuantity');

Route::post('getEventDataForTGP', [EventsController::class, 'getEventDataForTGP'])->name('getEventDataForTGP');
Route::post('updatePyamentResponse', [EventsController::class, 'updatePyamentResponse'])->name('updatePyamentResponse');
