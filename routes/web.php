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

Route::get('drugs',[App\Http\Controllers\GeneralControllers\InventoryController::class, 'drugs'] )->name('drugs');
Route::view('agreement','main.agreement')->name('agreement');
Route::get('pharmacy/{pharmacy}/{user}/invitations', [App\Http\Controllers\WebControllers\HomeController::class, 'invitations'])->name('invitations');
Route::post('invitation/submit', [App\Http\Controllers\WebControllers\HomeController::class, 'invitation_submit'])->name('confirm_invitations');
Route::get('pricing',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'index'] )->name('pricing');

Auth::routes();


Route::middleware('auth')->group(function(){
    //common to all users
    
    Route::get('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'create'])->name('setup');
    Route::post('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'store'])->name('setup');
    Route::post('getstates',[App\Http\Controllers\WebControllers\HomeController::class, 'states'])->name('getStates');
    Route::post('getcities',[App\Http\Controllers\WebControllers\HomeController::class, 'cities'])->name('getCities');
    Route::post('planpayment',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'planPayment'] )->name('planPayment');
    Route::get('payment/verification',[App\Http\Controllers\GeneralControllers\PaymentController::class, 'verify'] )->name('verify');
    
    
    //accessible on director dashboard and inside pharmacies
    Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('workspaces', [App\Http\Controllers\WebControllers\HomeController::class, 'workspaces'])->name('workspaces');
    
    Route::get('invoice',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'invoice'])->name('invoice');
    
    Route::get('profile', [App\Http\Controllers\GeneralControllers\UserController::class, 'profile'])->name('profile');
    Route::post('profile', [App\Http\Controllers\GeneralControllers\UserController::class, 'profile_update'])->name('profile');
    Route::get('security', [App\Http\Controllers\GeneralControllers\UserController::class, 'security'])->name('security');
    Route::post('security', [App\Http\Controllers\GeneralControllers\UserController::class, 'password_update'])->name('password_update');
    Route::get('setting', [App\Http\Controllers\GeneralControllers\UserController::class, 'setting'])->name('setting');
    Route::post('setting', [App\Http\Controllers\GeneralControllers\UserController::class, 'store_setting'])->name('setting');
    Route::get('activities', [App\Http\Controllers\GeneralControllers\UserController::class, 'activities'])->name("activities");
    
    
    Route::group(['middleware'=>'role:director'], function () {
        Route::get('subscription', [App\Http\Controllers\GeneralControllers\UserController::class, 'subscription'])->name("subscription");
        Route::get('transactions',[App\Http\Controllers\GeneralControllers\UserController::class, 'transactions'])->name('transactions');
    });
    Route::group(['middleware'=>'role:director,manager'], function () {
        Route::get('suppliers', [App\Http\Controllers\GeneralControllers\UserController::class, 'suppliers'])->name('suppliers');
        Route::post('supplier/save', [App\Http\Controllers\GeneralControllers\UserController::class, 'supplier_save'])->name('supplier.save');
        Route::get('staff', [App\Http\Controllers\GeneralControllers\UserController::class, 'staff'])->name("staff");
        Route::post('staff',[App\Http\Controllers\GeneralControllers\UserController::class, 'savestaff'])->name("staff");
        Route::post('staff/destroy',[App\Http\Controllers\GeneralControllers\UserController::class, 'destroystaff'])->name("staff.destroy");
    });

    include('pharmacy.php');
    include('admin.php');
});