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
    Route::get('payment/verification',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'verify'] )->name('verify');
    
    //accessible on director dashboard and inside pharmacies
    Route::get('dashboard', [App\Http\Controllers\WebControllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('workspaces', [App\Http\Controllers\WebControllers\HomeController::class, 'workspaces'])->name('workspaces');
    Route::get('subscription', [App\Http\Controllers\GeneralControllers\UserController::class, 'subscription'])->name("subscription");
    Route::get('transactions',[App\Http\Controllers\GeneralControllers\UserController::class, 'transactions'])->name('transactions');

    Route::get('profile', [App\Http\Controllers\GeneralControllers\UserController::class, 'profile'])->name('profile');
    Route::post('profile', [App\Http\Controllers\GeneralControllers\UserController::class, 'profile_update'])->name('profile');
    Route::get('security', [App\Http\Controllers\GeneralControllers\UserController::class, 'security'])->name('security');
    Route::post('security', [App\Http\Controllers\GeneralControllers\UserController::class, 'password_update'])->name('password_update');
    Route::get('setting', [App\Http\Controllers\GeneralControllers\UserController::class, 'setting'])->name('setting');
    Route::post('setting', [App\Http\Controllers\GeneralControllers\UserController::class, 'store_setting'])->name('setting');
    Route::get('activities', [App\Http\Controllers\GeneralControllers\UserController::class, 'activities'])->name("activities");
    
    

    Route::group(['middleware'=>'role:director'], function () {
        Route::get('suppliers', [App\Http\Controllers\GeneralControllers\UserController::class, 'suppliers'])->name('suppliers');
        Route::get('staff', [App\Http\Controllers\GeneralControllers\UserController::class, 'staff'])->name("staff");
        Route::post('staff',[App\Http\Controllers\GeneralControllers\UserController::class, 'savestaff'])->name("staff");
        Route::post('staff/destroy',[App\Http\Controllers\GeneralControllers\UserController::class, 'destroystaff'])->name("staff.destroy");

    });

    Route::group(['as'=>'pharmacy.','middleware'=>['pharmacy'] ,'prefix'=>'pharmacy/{pharmacy}'], function () {
        
        Route::get('checkout/{plan}',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'checkout'] )->name('checkout');
        Route::group(['middleware'=>['subscription']], function () {
            Route::get('dashboard', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'index'])->name('dashboard');
            Route::get('transactions', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'transactions'])->name('transactions');
            Route::get('staff', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'staff'])->name('staff');
            Route::post('staff', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'savestaff'])->name('staff');
            Route::get('subscription',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'subscription'] )->name('subscription');
            Route::get('drug', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'drug'])->name("drug");
            Route::get('permissions', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'permission'])->name("permissions");
            Route::get('patients', [App\Http\Controllers\GeneralControllers\PatientController::class, 'index'])->name("patients");
            Route::get('addpatient', [App\Http\Controllers\GeneralControllers\PatientController::class, 'add'])->name("addpatient");
            Route::get('patients/show', [App\Http\Controllers\GeneralControllers\PatientController::class, 'read'])->name("showpatients");
            Route::get('assessment', [App\Http\Controllers\GeneralControllers\PatientController::class, 'assess'])->name("assessment");
            Route::get('assessment/new', [App\Http\Controllers\GeneralControllers\PatientController::class, 'new'])->name("newassessment");
            Route::get('assessment/show', [App\Http\Controllers\GeneralControllers\PatientController::class, 'showassessment'])->name("showassessment");
            Route::get('prescription', [App\Http\Controllers\GeneralControllers\PatientController::class, 'prescription'])->name("prescription");
            Route::get('nonmedical-plan', [App\Http\Controllers\GeneralControllers\PatientController::class, 'plan'])->name("plan");
            Route::get('inventory', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'inventory'])->name("inventory");
            Route::get('shelf', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'shelf'])->name("shelf");
            Route::get('settings', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'settings'])->name("settings");

        });
    });

    include('admin.php');
});