<?php

use Illuminate\Support\Facades\Route;

Route::group(['as'=>'admin.','middleware'=>['role:admin'] ,'prefix'=>'admin'], function () {
    Route::view('dashboard','admin.dashboard')->name('dashboard');
    Route::view('pharmacies', 'admin.pharmacies')->name('pharmacies');
    Route::view('apis', 'admin.medicines.api')->name('medicines');
    Route::view('drugs','admin.medicines.drugs')->name('drugs');
    Route::view('categories','admin.medicines.categories')->name('drugs');
    Route::view('users','admin.users.list')->name('users');
    Route::post('user/save', [App\Http\Controllers\WebControllers\AdminControllers\DashboardController::class, 'saveuser'])->name('user.save');
    
    
    Route::get('medicine/interactions', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'interactions'])->name('medicine.interactions');
    
    Route::post('medicines/relationship/download', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'downloadRelationship'])->name('medicines.downloadrelationship');
    Route::post('medicines/relationship/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'uploadRelationship'])->name('medicines.uploadrelationship');
    
    
    Route::get('drugs/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'drugsUpload'])->name('drugs.upload');
    Route::post('drugs/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'uploadDrug'])->name('drugs.upload');
    // Route::get('diseases', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'diseases'])->name('diseases');
    
    Route::get('settings', [App\Http\Controllers\WebControllers\AdminControllers\SettingsController::class, 'index'])->name('settings');

    Route::get('transactions', [App\Http\Controllers\WebControllers\AdminControllers\PaymentController::class, 'index'])->name('payments');
    // Route::get('subscriptions', [App\Http\Controllers\WebControllers\AdminControllers\PaymentController::class, 'subscriptions'])->name('subscriptions');

    Route::view('patients', 'admin.patients')->name('patients');

    
    
    Route::get('roles', [App\Http\Controllers\WebControllers\AdminControllers\RolePermissionController::class, 'index'])->name("roles");
    Route::post('permissions', [App\Http\Controllers\WebControllers\AdminControllers\RolePermissionController::class, 'store'])->name("permissions");
    
    Route::get('assessments', [App\Http\Controllers\WebControllers\AdminControllers\TreatmentController::class, 'assessments'])->name("assessment");

    Route::get('assessment/show', [App\Http\Controllers\WebControllers\AdminControllers\TreatmentController::class, 'showassessment'])->name("showassessment");

});