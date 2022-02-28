<?php

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

Route::view('/','welcome')->name('index');
Route::view('agreement','agreement')->name('agreement');

Route::view('transactions', 'main.director.transactions')->name('transactions');
Route::view('profile', 'main.profile')->name('profile');

Route::view('staff', 'main.director.staff.list')->name("staff");
Route::view('new-staff', 'main.director.staff.create')->name("new-staff");
Route::view('payments', 'main.payments')->name("payments");
Route::view('activities', 'main.activities')->name("activities");
Route::get('subscription/{pharmacy}',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'index'] )->name('subscription');
Route::get('permissions', [App\Http\Controllers\GeneralControllers\DirectorController::class, 'permission'])->name("permissions");
Auth::routes();


Route::middleware('auth')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('pharmacies', [App\Http\Controllers\WebControllers\HomeController::class, 'pharmacies'])->name('pharmacies');
    Route::get('workspace', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'workspaces'])->name('workspaces');
    // Route::get('dashboards', [App\Http\Controllers\WebControllers\HomeController::class, 'director'])->name('dashboard');
    Route::get('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'create'])->name('setup');
    Route::post('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'store'])->name('setup');
    Route::post('getstates',[App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('getStates');
    Route::post('getcities',[App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('getCities');
});



Route::group(['as'=>'pharmacy.','prefix'=>'pharmacy'], function () {
    Route::get('{pharmacy}/dashboard', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'index'])->name('dashboard');
    Route::view('transactions', 'main.pharmacy.transactions')->name('transactions');
    Route::view('staff', 'main.pharmacy.staff')->name('staff');
    Route::view('new-staff', 'main.pharmacy.addstaff')->name('new-staff');
    
    Route::view('staff-profile', 'main.profile')->name('staff-profile');
});