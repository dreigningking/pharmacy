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
Route::view('dashboard','main.dashboard.director')->name('dashboard');
Route::view('transactions', 'main.transactions.director')->name('transactions');
Route::view('profile', 'main.profile')->name('profile');
Route::view('pharmacies', 'main.pharmacies')->name('pharmacies');
Route::view('staff', 'main.staff.admin')->name("staff");
Route::view('new-staff', 'main.addstaff.admin')->name("new-staff");
Auth::routes();

// Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('home');
Route::view('setup','main.newpharmacy.details')->name('setup');
Route::post('getstates',[App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('getStates');
Route::post('getcities',[App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('getCities');
Route::view('subscription', 'main.newPharmacy.subscription')->name('subscription');

Route::group(['as'=>'pharmacy.','prefix'=>'pharmacy'], function () {
    // Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('home');
    Route::view('dashboard','main.dashboard.pharmacy')->name("dashboard");
    Route::view('transactions', 'main.transactions.pharmacy')->name('transactions');
    Route::view('staff', 'main.staff.pharmacy')->name('staff');
    Route::view('new-staff', 'main.addstaff.pharmacy')->name('new-staff');
});