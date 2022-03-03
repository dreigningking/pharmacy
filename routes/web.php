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
Route::get('profile', [App\Http\Controllers\GeneralControllers\UserController::class, 'index'])->name('profile');

Route::view('staff', 'main.director.staff.list')->name("staff");
Route::view('new-staff', 'main.director.staff.create')->name("new-staff");
Route::view('payments', 'main.payments')->name("payments");
Route::view('activities', 'main.activities')->name("activities");


Auth::routes();


Route::middleware('auth')->group(function(){
    Route::get('workspace', [App\Http\Controllers\WebControllers\HomeController::class, 'workspaces'])->name('workspaces');
    Route::get('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'create'])->name('setup');
    Route::post('setup',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'store'])->name('setup');

    Route::post('getstates',[App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('getStates');
    Route::post('getcities',[App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('getCities');
    
    Route::group(['middleware'=>'role:director'], function () {
        Route::get('dashboard', [App\Http\Controllers\GeneralControllers\DirectorController::class, 'index'])->name('dashboard');
        Route::get('pharmacies', [App\Http\Controllers\GeneralControllers\DirectorController::class, 'pharmacies'])->name('pharmacies');
        Route::get('permissions', [App\Http\Controllers\GeneralControllers\DirectorController::class, 'permission'])->name("permissions");

    });
});



Route::group(['as'=>'pharmacy.','middleware'=>'pharmacy:{pharmacy}' ,'prefix'=>'pharmacy/{pharmacy}'], function () {
    Route::get('dashboard', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'index'])->name('dashboard');
    Route::get('transactions', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'transactions'])->name('transactions');
    Route::get('staff', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'staff'])->name('staff');
    Route::view('new-staff', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'newstaff'])->name('new-staff');
    Route::get('medicine', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'medicines'])->name("medicine");
    Route::get('subscription',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'subscription'] )->name('subscription');

});