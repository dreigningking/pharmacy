<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WebControllers\HomeController;
use App\Http\Controllers\General\UserController;
use App\Http\Controllers\General\PaymentController;
use App\Http\Controllers\General\ResourcesController;
use App\Http\Controllers\General\SubscriptionController;

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

Route::view('agreement','agreement')->name('agreement');

Route::get('pharmacy/{pharmacy}/{user}/invitations', [HomeController::class, 'invitations'])->name('invitations');
Route::post('invitation/submit', [HomeController::class, 'invitation_submit'])->name('confirm_invitations');
Route::get('pricing',[SubscriptionController::class, 'index'] )->name('pricing');

Auth::routes();
Route::view('change_password','auth.forcepassword')->name('forcepassword');
Route::post('change_password',[LoginController::class, 'forcepassword'] )->name('forcepassword');
    //common to all users
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::post('getstates',[HomeController::class, 'states'])->name('getStates');
Route::post('getcities',[HomeController::class, 'cities'])->name('getCities');

Route::get('payment/verification',[PaymentController::class, 'verify'] )->name('paymentverify');

//accessible on director dashboard and inside pharmacies
Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::post('profile', [UserController::class, 'profile_update'])->name('profile');
Route::post('security', [UserController::class, 'password_update'])->name('password_update');
Route::post('setting', [UserController::class, 'store_setting'])->name('setting');

Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::group(['prefix'=> 'subscription','as'=> 'subscription.'],function(){
    Route::get('/', [SubscriptionController::class,'show'])->name("show");
    Route::get('new', [SubscriptionController::class,'create'])->name("create");
    Route::post('store',[SubscriptionController::class, 'store'] )->name('store');
    Route::post('update',[SubscriptionController::class, 'update'] )->name('update');

    Route::group(['prefix'=> 'sms','as'=> 'sms.'],function(){
        Route::post('purchase', [SubscriptionController::class,'sms_purchase'])->name("purchase");
        Route::post('allocation', [SubscriptionController::class,'sms_allocation'])->name("allocation");
    });
});
Route::get('transactions',[PaymentController::class, 'transactions'])->name('transactions');
Route::get('invoice/{payment}',[PaymentController::class, 'invoice'])->name('invoice');

Route::view('support/inbox','user.support.inbox')->name('support.inbox');
Route::view('support/read','user.support.read')->name('support.read');

include('pharmacy.php');
include('admin.php');

