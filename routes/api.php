<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Use App\Http\Controllers\Api\Client\ClientController;
Use App\Http\Controllers\Api\UserController;
Use App\Http\Controllers\Api\EventsController;

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
    Route::post('create_user',[UserController::class,'create'])->name('user.create');

});

Route::post('landingPageView', [EventsController::class, 'renderLandingPageApi'])->name('landingPage');

Route::post('landingPageViewApi', [EventsController::class, 'renderLandingPageApi'])->name('landingPageApi');
