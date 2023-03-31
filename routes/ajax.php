<?php

use App\Http\Controllers\Mail\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Events\EventsController;
use App\Http\Controllers\Cdn\FilesController;
use App\Http\Controllers\Admin\Events\RewardsController;
use App\Http\Controllers\Admin\Events\AchievementsController;

## Validate Events Slug on Event Info
Route::post('/ajax/upload-file',[FilesController::class,'uploadFile'])->name('ajax.upload-file');

Route::post('/rewards/toggle_is_dependent',[RewardsController::class,'toggleIsDependent'])->name('rewards.toggle_is_dependent');

Route::post('/rewards/update_dependent_sku',[RewardsController::class,'updateDependentSku'])->name('rewards.update_dependent_sku');

Route::post('/rewards/toggle_reward_visibility',[RewardsController::class,'toggleRewardVisibility'])->name('rewards.toggle_reward_visibility');

Route::get('/events',[EventsController::class,'index'])->name('events.list');

Route::post('/event/publish',[EventsController::class,'publishEvent'])->name('events.publish');


Route::post('/event/hide',[EventsController::class,'hideEvent'])->name('events.hide');

Route::post('/event/removeUser',[EventsController::class,'removeEventUser'])->name('eventUser.remove');

Route::post('event/{id}/coupon/add_edit/{coupon_id}',[EventsController::class,'renderCouponAdd'])->name('coupon.add_edit');

Route::get('event/{id}/purchase_history/{user_id}',[EventsController::class,'PurchaseHistory'])->name('users.purchase_history');

Route::middleware('auth')->group(function () {
    Route::get('/admin/event/{id}/achievements/test', [MailController::class, 'test'])->name('events.achievements.test.email');
});


Route::post('achievement/reorderData',[AchievementsController::class,'reorderDataList'])->name('event.achievement.reorderDataList');
