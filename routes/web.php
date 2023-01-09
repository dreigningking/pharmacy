<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/',function(){
    if(auth()->check())
        return redirect('/home');
    else
        return view('welcome');
    })->name('index');

Route::get('drugs',[App\Http\Controllers\GeneralControllers\InventoryController::class, 'drugs'] )->name('drugs');
Route::get('medicine',[App\Http\Controllers\GeneralControllers\InventoryController::class, 'medicines'] )->name('medicines');

Route::view('agreement','agreement')->name('agreement');

// Route::get('donation/access',[App\Http\Controllers\TestController\HavronController::class, 'get_token'])->name('havron.token');
// Route::get('donation',[App\Http\Controllers\TestController\HavronController::class, 'index'])->name('havron');
// Route::post('donation',[App\Http\Controllers\TestController\HavronController::class, 'store'])->name('havron.donate');
// Route::get('donation/verification',[App\Http\Controllers\TestController\HavronController::class, 'verify'] )->name('havron.verify');
// Route::get('donation/success',[App\Http\Controllers\TestController\HavronController::class, 'success'])->name('havron.success');
// Route::get('donation/error',[App\Http\Controllers\TestController\HavronController::class, 'error'])->name('havron.error');

Route::get('pharmacy/{pharmacy}/{user}/invitations', [App\Http\Controllers\WebControllers\HomeController::class, 'invitations'])->name('invitations');
Route::post('invitation/submit', [App\Http\Controllers\WebControllers\HomeController::class, 'invitation_submit'])->name('confirm_invitations');
Route::get('pricing',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'pricing'] )->name('pricing');

Auth::routes();
Route::view('change_password','auth.forcepassword')->name('forcepassword');
Route::post('change_password',[App\Http\Controllers\Auth\LoginController::class, 'forcepassword'] )->name('forcepassword');

Route::middleware(['auth','forcepassword'])->group(function(){
    //common to all users
    Route::get('home', [App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('home');
    Route::get('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'create'])->name('setup');
    Route::post('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'store'])->name('setup');
    Route::post('getstates',[App\Http\Controllers\WebControllers\HomeController::class, 'states'])->name('getStates');
    Route::post('getcities',[App\Http\Controllers\WebControllers\HomeController::class, 'cities'])->name('getCities');
    Route::post('planpayment',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'planPayment'] )->name('planPayment');
    Route::get('payment/verification',[App\Http\Controllers\GeneralControllers\PaymentController::class, 'verify'] )->name('verify');
    
    //accessible on director dashboard and inside pharmacies
    Route::get('invoice',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'invoice'])->name('invoice');
    Route::get('profile', [App\Http\Controllers\GeneralControllers\UserController::class, 'profile'])->name('profile');
    Route::post('profile', [App\Http\Controllers\GeneralControllers\UserController::class, 'profile_update'])->name('profile');
    Route::post('security', [App\Http\Controllers\GeneralControllers\UserController::class, 'password_update'])->name('password_update');
    Route::post('setting', [App\Http\Controllers\GeneralControllers\UserController::class, 'store_setting'])->name('setting');

    Route::group(['middleware'=>'role:director'], function () {
        Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('subscription', [App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'index'])->name("subscription");
        Route::get('subscription/checkout/{plan}',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'checkout'] )->name('checkout');
        
        Route::get('transactions',[App\Http\Controllers\GeneralControllers\PaymentController::class, 'transactions'])->name('transactions');
        Route::view('support/inbox','user.support.inbox')->name('support.inbox');
        Route::view('support/read','user.support.read')->name('support.read');
    });
    
    include('pharmacy.php');
    include('admin.php');
});