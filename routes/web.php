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

Route::view('transactions', 'main.transactions.director')->name('transactions');
Route::view('profile', 'main.profile.admin')->name('profile');
Route::view('pharmacies', 'main.pharmacies.admin')->name('pharmacies');
Route::view('staff', 'main.staff.admin')->name("staff");
Route::view('new-staff', 'main.addstaff.admin')->name("new-staff");
Route::view('payments', 'main.payments')->name("payments");
Auth::routes();


Route::middleware('auth')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'director'])->name('home');
    Route::get('dashboards', [App\Http\Controllers\WebControllers\HomeController::class, 'director'])->name('dashboard');
    Route::get('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'create'])->name('setup');
    Route::post('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'store'])->name('setup');
    Route::post('getstates',[App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('getStates');
    Route::post('getcities',[App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('getCities');
});

Route::view('subscription', 'main.newPharmacy.subscription')->name('subscription');

Route::group(['as'=>'pharmacy.','prefix'=>'pharmacy'], function () {
    Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('dashboard');
    Route::view('transactions', 'main.transactions.pharmacy')->name('transactions');
    Route::view('staff', 'main.staff.pharmacy')->name('staff');
    Route::view('new-staff', 'main.addstaff.pharmacy')->name('new-staff');
    Route::view('workspace', 'main.pharmacies.users')->name('pharmacies');
    Route::view('staff-profile', 'main.profile.pharmacystaff')->name('staff-profile');
});