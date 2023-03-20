<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Events\{
    EventsController,
    SocialSeoController,
    RewardsController,
    EventsFaqController,
    EventSuccessPageController,
    AchievementsController
};
use App\Http\Controllers\Public\RegistrationController;
// use App\Http\Controllers\Admin\Events\{
//     SocialSeoController
// };
// use App\Http\Controllers\Admin\Events\{
//     RewardsController
// };
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

## Event Info
Route::middleware('auth')->group(function () {
    Route::get('/admin/event/{id}/faq', [EventsFaqController::class, 'create'])->name('admin.events.faq.create');
    Route::post('/admin/event/{id}/faq', [EventsFaqController::class, 'store'])->name('admin.events.faq.store');

    Route::get('/admin/event/{id}/tnc', [EventsFaqController::class, 'createTnc'])->name('admin.events.faq.createtnc');
    Route::post('/admin/event/{id}/tnc', [EventsFaqController::class, 'storeTnc'])->name('admin.events.faq.storetnc');

    Route::get('/admin/event/{id}/info/essentials', [EventsController::class, 'renderEssentialsSection'])->name('admin.events.info.essentials');
    Route::post('/admin/event/{id}/info/essentials', [EventsController::class, 'submitEssentialsDetails'])->name('admin.events.info.essentials.store');

    Route::get('/admin/event/{id}/info/dates', [EventsController::class, 'renderDatesSection'])->name('admin.events.info.dates');
    Route::post('/admin/event/{id}/info/dates', [EventsController::class, 'submitDatesDetails'])->name('admin.events.info.essentials.storeDate');

    Route::get('/admin/event/{id}/info/images', [EventsController::class, 'renderImagesSection'])->name('admin.events.info.images');
    Route::post('/admin/event/{id}/info/images', [EventsController::class, 'submitImagesDetails'])->name('admin.events.info.images.store');

    Route::get('/admin/event/{id}/info/templates', [EventsController::class, 'renderTemplateSection'])->name('admin.events.info.templates');
    Route::post('/admin/event/{id}/info/templates', [EventsController::class, 'submitTemplateDetails'])->name('admin.events.info.templates.store');
    Route::get('image-download/{image}', [EventsController::class, 'downloadImage'])->name('download.image');

    Route::get('/admin/event/{id}/info/social', [SocialSeoController::class, 'renderSocialSeoSection'])->name('admin.events.info.socialSeo');
    Route::post('/admin/event/{id}/info/social', [SocialSeoController::class, 'submitSocialSeoDetails'])->name('admin.events.info.socialSeo.store');

    Route::get('/admin/event/{id}/rewards', [RewardsController::class, 'renderRewardsSection'])->name('admin.events.rewards');
    Route::get('/admin/event/{id}/rewards/add', [RewardsController::class, 'addRewardsSection'])->name('admin.events.rewards.add');
    Route::post('/admin/event/{id}/rewards', [RewardsController::class, 'submitRewardsDetails'])->name('admin.events.rewards.store');
    Route::get('/admin/event/{id}/rewards/edit/{reward_id}', [RewardsController::class, 'editRewardsSection'])->name('admin.events.rewards.edit');
    Route::post('/admin/event/{id}/rewards/edit/{reward_id}', [RewardsController::class, 'updateRewardsSection'])->name('admin.events.rewards.update');
    Route::post('/admin/event/{id}/rewards/sort', [RewardsController::class, 'sortRewardsDetails'])->name('admin.events.rewards.sort');
    Route::post('/admin/event/rewards/removePrice', [RewardsController::class, 'removeRewardPrice'])->name('admin.events.rewards.removePrice');

    Route::get('/admin/event/{id}/rewards_pricing/add/{reward_id}', [RewardsController::class, 'addRewardsPriceSection'])->name('admin.events.rewardsPrice.add');
    Route::post('/admin/event/{id}/rewards_pricing/{reward_id}', [RewardsController::class, 'submitRewardsPriceDetails'])->name('admin.events.rewardsPrice.store');

    Route::get('/admin/event/{id}/multi_quantity_discount', [RewardsController::class, 'renderMultiQuantityDiscountSection'])->name('admin.events.multiQuantityDiscount');
    Route::post('/admin/event/{id}/multi_quantity_discount', [RewardsController::class, 'submitMultiQuantityDiscountDetails'])->name('admin.events.multiQuantityDiscount.store');
    Route::delete('/admin/event/{id}/multi_quantity_discount/delete/{discount_id}', [RewardsController::class, 'deleteMultiQuantityDiscountDetails'])->name('admin.events.multiQuantityDiscount.delete');

    Route::get('/admin/event/{id}/rewards_instructions', [RewardsController::class, 'rewardsInstructionSection'])->name('admin.events.rewards.instructions');
    Route::post('/admin/event/{id}/rewards_instructions', [RewardsController::class, 'submitRewardsInstruction'])->name('admin.events.rewards.instructions.store');

    Route::get('/admin/event/{id}/registration_setup', [EventsController::class, 'renderRegistrationSetupSection'])->name('admin.events.registration.manage');
    Route::post('/admin/event/{id}/registration_setup', [EventsController::class, 'submitRegistrationSetupDetails'])->name('admin.events.registration.store');

    Route::get('/admin/event/{id}/coupons', [EventsController::class, 'renderCouponsSection'])->name('admin.events.coupons');
    Route::post('/admin/event/{id}/coupons', [EventsController::class, 'submitCouponDetails'])->name('admin.events.coupon.store');
    Route::delete('/admin/event/{id}/coupon/delete/{coupon_id}', [EventsController::class, 'deleteCoupon'])->name('admin.events.coupon.delete');

    Route::get('/admin/event/{id}/landingPage/setup', [EventsController::class, 'renderLandingPageSection'])->name('admin.events.landingPage.setup');
    Route::get('/admin/event/{id}/landingPage/mobileSetup', [EventsController::class, 'renderLandingPageMobileSection'])->name('admin.events.landingPage.mobileSetup');

    Route::post('/admin/event/{id}/landingPage/setup', [EventsController::class, 'submitLandingPageDetails'])->name('admin.events.landingPage.store');
    Route::post('/admin/event/{id}/landingPage/mobileSetup', [EventsController::class, 'submitLandingPageMobileDetails'])->name('admin.events.landingPageMobile.store');

    Route::get('/admin/event/{id}/landingPage/view', [EventsController::class, 'renderLandingPage'])->name('admin.events.landingPage.view');

    Route::get('/admin/event/{id}/info/activities', [EventsController::class, 'renderActivitiesSection'])->name('admin.events.info.activities');

    Route::get('/admin/event/{id}/info/success_page', [EventSuccessPageController::class, 'renderSuccessPage'])->name('admin.events.success');
    Route::post('/admin/event/{id}/info/success_page', [EventSuccessPageController::class, 'submitSuccessPageDetails'])->name('admin.events.success.store');
    Route::post('/admin/event/set_event_success_email', [EventSuccessPageController::class, 'sendSuccessEmail'])->name('admin.events.success.setSuccessEmail');
    
    Route::get('/admin/event/{id}/achievements', [AchievementsController::class, 'index'])->name('admin.events.achievements.list');
    Route::post('/admin/event/{id}/achievements', [AchievementsController::class, 'store'])->name('admin.events.achievements.store');
    Route::get('/admin/event/{id}/achievements/edit/{achievementId}', [AchievementsController::class, 'get'])->name('admin.events.achievements.edit');
    Route::get('/admin/event/{id}/achievements/create', [AchievementsController::class, 'get'])->name('admin.events.achievements.create');
    Route::post('/admin/event/{id}/achievements/{achievementId}', [AchievementsController::class, 'update'])->name('admin.events.achievements.update');
    Route::delete('/admin/event/{id}/achievements/{achievementId}', [AchievementsController::class, 'delete'])->name('admin.events.achievements.delete');
});
    Route::get('/admin/event/{id}/unlayer', [EventsController::class, 'unlayer'])->name('admin.events.unlayer');


require __DIR__.'/auth.php';
require __DIR__.'/ajax.php';
