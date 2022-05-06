<?php

Route::group(['as'=>'pharmacy.','middleware'=>['pharmacy'] ,'prefix'=>'pharmacy/{pharmacy}'], function () {
        
    Route::get('checkout/{plan}',[App\Http\Controllers\GeneralControllers\SubscriptionController::class, 'checkout'] )->name('checkout');
    
    Route::group(['middleware'=>['subscription']], function () {
        Route::get('dashboard', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'index'])->name('dashboard');
        Route::get('transactions', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'transactions'])->name('transactions');
        Route::get('staff', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'staff'])->name('staff');
        Route::post('staff', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'savestaff'])->name('staff');
        Route::get('subscription',[App\Http\Controllers\GeneralControllers\PharmacyController::class, 'subscription'] )->name('subscription');
        Route::get('permissions', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'permission'])->name("permissions");
        Route::get('patients', [App\Http\Controllers\GeneralControllers\PatientController::class, 'index'])->name("patients");
        Route::get('addpatient', [App\Http\Controllers\GeneralControllers\PatientController::class, 'add'])->name("addpatient");
        Route::post('storepatient', [App\Http\Controllers\GeneralControllers\PatientController::class, 'store'])->name("storepatient");
        Route::get('patients/show', [App\Http\Controllers\GeneralControllers\PatientController::class, 'read'])->name("showpatients");
        Route::get('assessment', [App\Http\Controllers\GeneralControllers\PatientController::class, 'assess'])->name("assessment");
        Route::get('assessment/new', [App\Http\Controllers\GeneralControllers\PatientController::class, 'new'])->name("newassessment");
        Route::get('assessment/show', [App\Http\Controllers\GeneralControllers\PatientController::class, 'showassessment'])->name("showassessment");
        Route::get('prescription', [App\Http\Controllers\GeneralControllers\PatientController::class, 'prescription'])->name("prescription");
        Route::get('nonmedical-plan', [App\Http\Controllers\GeneralControllers\PatientController::class, 'plan'])->name("plan");
        
        Route::get('inventory', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'list'])->name("inventory.list");
        Route::get('inventory/batches', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'batches'])->name("inventory.batches");
        Route::get('inventory/setup', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'start'])->name("inventory.start");
        Route::post('inventory/start/export', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'export'])->name("inventory.start.export");
        Route::post('inventory/start/import', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'import'])->name("inventory.start.import");
        Route::post('inventory/start/sample', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'sample'])->name("inventory.start.sample");
        
        Route::get('shelf', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'shelf'])->name("shelf");
        Route::get('settings', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'settings'])->name("settings");

        Route::get('purchases',[App\Http\Controllers\GeneralControllers\SupplyController::class, 'list'])->name('purchase.list');
        Route::get('purchase/new',[App\Http\Controllers\GeneralControllers\SupplyController::class, 'create'])->name('purchase.create');
        Route::post('purchase/inventory/new',[App\Http\Controllers\GeneralControllers\SupplyController::class, 'create_from_inventory'])->name('purchase.inventory.create');
        Route::get('purchase/{purchase}/edit',[App\Http\Controllers\GeneralControllers\SupplyController::class, 'edit'])->name('purchase.edit');
        Route::post('purchase/{purchase}/update',[App\Http\Controllers\GeneralControllers\SupplyController::class, 'update'])->name('purchase.update');
        Route::post('purchase/save',[App\Http\Controllers\GeneralControllers\SupplyController::class, 'store'])->name('purchase.store');
        Route::get('purchase/{purchase}/add_to_inventory',[App\Http\Controllers\GeneralControllers\SupplyController::class, 'add_to_inventory'])->name('purchase.add_to_inventory');
        Route::post('purchase/inventory/save_to_inventory',[App\Http\Controllers\GeneralControllers\SupplyController::class, 'save_to_inventory'])->name('purchase.save_to_inventory');
        Route::post('purchase/delete',[App\Http\Controllers\GeneralControllers\SupplyController::class, 'delete'])->name('purchase.delete');

        Route::get('transfers',[App\Http\Controllers\GeneralControllers\TransferController::class, 'list'])->name('transfer.list');
        Route::get('transfer/new',[App\Http\Controllers\GeneralControllers\TransferController::class, 'create'])->name('transfer.create');
        Route::post('transfer/inventory/new',[App\Http\Controllers\GeneralControllers\TransferController::class, 'create_from_inventory'])->name('transfer.inventory.create');
        Route::get('transfer/{transfer}/edit',[App\Http\Controllers\GeneralControllers\TransferController::class, 'edit'])->name('transfer.edit');
        Route::post('transfer/{transfer}/update',[App\Http\Controllers\GeneralControllers\TransferController::class, 'update'])->name('transfer.update');
        Route::post('transfer/save',[App\Http\Controllers\GeneralControllers\TransferController::class, 'store'])->name('transfer.store');
        Route::post('transfer/add_to_inventory',[App\Http\Controllers\GeneralControllers\TransferController::class, 'add_to_inventory'])->name('transfer.add_to_inventory');
        Route::post('transfer/delete',[App\Http\Controllers\GeneralControllers\TransferController::class, 'delete'])->name('transfer.delete');

    });
});