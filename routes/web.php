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



Route::view('/','main.welcome')->name('index');
Route::view('agreement','main.agreement')->name('agreement');
Route::get('pricing',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'index'] )->name('plans');

Auth::routes();


Route::middleware('auth')->group(function(){
    //common to all users
    Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('workspaces', [App\Http\Controllers\WebControllers\HomeController::class, 'workspaces'])->name('workspaces');
    Route::get('invitations', [App\Http\Controllers\WebControllers\HomeController::class, 'invitations'])->name('invitations');
    Route::get('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'create'])->name('setup');
    Route::post('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'store'])->name('setup');
    Route::post('getstates',[App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('getStates');
    Route::post('getcities',[App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('getCities');
    Route::post('checkout',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'checkout'] )->name('checkout');
    
    //accessible on director dashboard and inside pharmacies
    Route::get('subscription', [App\Http\Controllers\GeneralControllers\DirectorController::class, 'subscription'])->name("subscription");
    Route::get('transactions',[App\Http\Controllers\GeneralControllers\DirectorController::class, 'transactions'])->name('transactions');

    Route::get('profile', [App\Http\Controllers\GeneralControllers\UserController::class, 'profile'])->name('profile');
    Route::post('profile', [App\Http\Controllers\GeneralControllers\UserController::class, 'profile_update'])->name('profile');
    Route::get('security', [App\Http\Controllers\GeneralControllers\UserController::class, 'security'])->name('security');
    Route::post('security', [App\Http\Controllers\GeneralControllers\UserController::class, 'password_update'])->name('password_update');
    Route::get('setting', [App\Http\Controllers\GeneralControllers\UserController::class, 'setting'])->name('setting');
    Route::post('setting', [App\Http\Controllers\GeneralControllers\UserController::class, 'store_setting'])->name('setting');
    Route::get('activities', [App\Http\Controllers\GeneralControllers\UserController::class, 'activities'])->name("activities");
    Route::get('medicine', [App\Http\Controllers\GeneralControllers\MedicineController::class, 'index'])->name("medicine");
    Route::get('addmedicine', [App\Http\Controllers\GeneralControllers\MedicineController::class, 'create'])->name("addmedicine");
    

    Route::group(['middleware'=>'role:director'], function () {
        Route::get('suppliers', [App\Http\Controllers\GeneralControllers\DirectorController::class, 'suppliers'])->name('suppliers');
        Route::get('staff', [App\Http\Controllers\GeneralControllers\DirectorController::class, 'staff'])->name("staff");
        Route::get('new-staff',[App\Http\Controllers\GeneralControllers\DirectorController::class, 'newstaff'])->name("new-staff");

    });

    Route::group(['as'=>'pharmacy.','middleware'=>['pharmacy'] ,'prefix'=>'pharmacy/{pharmacy}'], function () {
        Route::get('dashboard', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'index'])->name('dashboard');
        Route::get('transactions', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'transactions'])->name('transactions');
        Route::get('staff', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'staff'])->name('staff');
        Route::get('new-staff', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'newstaff'])->name('new-staff');
        Route::get('subscription',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'index'] )->name('subscription');
        Route::get('drug', [App\Http\Controllers\GeneralControllers\MedicineController::class, 'drug'])->name("drug");
        Route::get('permissions', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'permission'])->name("permissions");
    });
});