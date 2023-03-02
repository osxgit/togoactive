<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Events\EventsController;
use App\Http\Controllers\Cdn\FilesController;
use App\Http\Controllers\Admin\Events\RewardsController;

## Validate Events Slug on Event Info
Route::post('/ajax/upload-file',[FilesController::class,'uploadFile'])->name('ajax.upload-file');

Route::post('/rewards/toggle_is_dependent',[RewardsController::class,'toggleIsDependent'])->name('rewards.toggle_is_dependent');

Route::post('/rewards/update_dependent_sku',[RewardsController::class,'updateDependentSku'])->name('rewards.update_dependent_sku');

Route::post('/rewards/toggle_reward_visibility',[RewardsController::class,'toggleRewardVisibility'])->name('rewards.toggle_reward_visibility');

Route::get('/events',[EventsController::class,'index'])->name('events.list');

Route::post('/event/publish',[EventsController::class,'publishEvent'])->name('events.publish');


Route::post('/event/hide',[EventsController::class,'hideEvent'])->name('events.hide');

Route::post('event/{id}/coupon/add_edit/{coupon_id}',[EventsController::class,'renderCouponAdd'])->name('coupon.add_edit');



