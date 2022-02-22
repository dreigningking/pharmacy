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
Route::view('/dashboard','main.dashboard.director');
Auth::routes();

// Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('home');

Route::group(['as'=>'pharmacy.','prefix'=>'pharmacy'], function () {
    // Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('home');
    Route::view('dashboard','main.dashboard.pharmacy');
});