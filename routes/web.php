<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Events\{
    EventsController
};
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
    Route::get('/admin/event/{id}/info/essentials', [EventsController::class, 'renderEssentialsSection'])->name('admin.events.info.essentials');
    Route::post('/admin/event/{id}/info/essentials', [EventsController::class, 'submitEssentialsDetails'])->name('admin.events.info.essentials.store');

    Route::get('/admin/event/{id}/info/dates', [EventsController::class, 'renderDatesSection'])->name('admin.events.info.dates');
    Route::post('/admin/event/{id}/info/dates', [EventsController::class, 'submitDatesDetails'])->name('admin.events.info.essentials.storeDate');

    Route::get('/admin/event/{id}/info/images', [EventsController::class, 'renderImagesSection'])->name('admin.events.info.images');
    Route::get('/admin/event/{id}/info/activities', [EventsController::class, 'renderActivitiesSection'])->name('admin.events.info.activities');
});


require __DIR__.'/auth.php';
