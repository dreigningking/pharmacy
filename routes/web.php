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
Route::view('payments', 'main.user.payments')->name("payments");
Route::view('activities', 'main.user.activities')->name("activities");

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

    //accessible on director dashboard and inside pharmacies
    Route::get('medicine', [App\Http\Controllers\GeneralControllers\MedicineController::class, 'index'])->name("medicine");
    Route::get('addmedicine', [App\Http\Controllers\GeneralControllers\MedicineController::class, 'create'])->name("addmedicine");
    

    Route::group(['middleware'=>'role:director'], function () {
        Route::get('pharmacies', [App\Http\Controllers\GeneralControllers\DirectorController::class, 'pharmacies'])->name('pharmacies');
        Route::get('permissions', [App\Http\Controllers\GeneralControllers\DirectorController::class, 'permission'])->name("permissions");

    });

    Route::group(['as'=>'pharmacy.','middleware'=>['pharmacy'] ,'prefix'=>'pharmacy/{pharmacy}'], function () {
        Route::get('dashboard', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'index'])->name('dashboard');
        Route::get('transactions', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'transactions'])->name('transactions');
        Route::get('staff', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'staff'])->name('staff');
        Route::get('new-staff', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'newstaff'])->name('new-staff');
        Route::get('subscription',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'subscription'] )->name('subscription');
        Route::get('drug', [App\Http\Controllers\GeneralControllers\MedicineController::class, 'drug'])->name("drug");
    });
});



