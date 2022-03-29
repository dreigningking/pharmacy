<?php

Route::group(['as'=>'admin.','middleware'=>['role:admin'] ,'prefix'=>'admin'], function () {
    Route::get('dashboard', [App\Http\Controllers\WebControllers\AdminControllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('users', [App\Http\Controllers\WebControllers\AdminControllers\DashboardController::class, 'users'])->name('users');
    Route::post('user/save', [App\Http\Controllers\WebControllers\AdminControllers\DashboardController::class, 'saveuser'])->name('user.save');
    
    Route::get('medicines', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'index'])->name('medicines');
    Route::get('medicines/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'upload'])->name('medicines.upload');
    Route::post('medicines/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'uploadsave'])->name('medicines.uploadsave');
    Route::get('medicine/create', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'create'])->name('medicine.create');
    Route::post('medicine/save', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'store'])->name("medicine.save");
    Route::get('diseases', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'diseases'])->name('diseases');
    Route::get('drugs', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'drugs'])->name('drugs');

    Route::get('settings', [App\Http\Controllers\WebControllers\AdminControllers\SettingsController::class, 'index'])->name('settings');

    Route::get('transactions', [App\Http\Controllers\WebControllers\AdminControllers\PaymentController::class, 'index'])->name('payments');
    // Route::get('subscriptions', [App\Http\Controllers\WebControllers\AdminControllers\PaymentController::class, 'subscriptions'])->name('subscriptions');
    
    Route::get('patients', [App\Http\Controllers\WebControllers\AdminControllers\TreatmentController::class, 'patients'])->name('patients');

    Route::get('pharmacies', [App\Http\Controllers\WebControllers\AdminControllers\TreatmentController::class, 'pharmacies'])->name('pharmacies');
    
    Route::get('roles', [App\Http\Controllers\WebControllers\AdminControllers\RolePermissionController::class, 'index'])->name("roles");
    Route::post('permissions', [App\Http\Controllers\WebControllers\AdminControllers\RolePermissionController::class, 'store'])->name("permissions");
    
    Route::get('assessments', [App\Http\Controllers\WebControllers\AdminControllers\TreatmentController::class, 'assessments'])->name("assessment");

    Route::get('assessment/show', [App\Http\Controllers\WebControllers\AdminControllers\TreatmentController::class, 'showassessment'])->name("showassessment");


   
});