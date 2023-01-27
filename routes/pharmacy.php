<?php

use Illuminate\Support\Facades\Route;
// 'middleware'=>['pharmacy'] ,
Route::group(['as'=>'pharmacy.','prefix'=>'pharmacy/{pharmacy}'], function () {
    // Route::group(['middleware'=>['subscription']], function () {
        Route::get('dashboard', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'index'])->name('dashboard');
        Route::get('notifications', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'notifications'])->name('notifications');
        Route::get('settings', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'settings'])->name("settings");
        Route::post('settings', [App\Http\Controllers\GeneralControllers\PharmacyController::class, 'settings'])->name("settings");
        
        Route::group(['middleware'=>'role:director,manager','as'=> 'staff.'], function () {
            Route::post('staff',[App\Http\Controllers\GeneralControllers\StaffController::class, 'store'])->name("store");
            Route::post('staff/destroy',[App\Http\Controllers\GeneralControllers\StaffController::class, 'destroy'])->name("destroy");
            Route::get('activities', [App\Http\Controllers\GeneralControllers\StaffController::class, 'activities'])->name("activities");
        });
        
        Route::group(['prefix'=>'patients','as'=> 'patients.'], function () {
            Route::get('/', [App\Http\Controllers\GeneralControllers\PatientController::class, 'index'])->name("index");
            Route::get('view/{patient}', [App\Http\Controllers\GeneralControllers\PatientController::class, 'view'])->name("view");        
            Route::get('new', [App\Http\Controllers\GeneralControllers\PatientController::class, 'create'])->name("create");
            Route::post('store', [App\Http\Controllers\GeneralControllers\PatientController::class, 'store'])->name("store");
            Route::post('update', [App\Http\Controllers\GeneralControllers\PatientController::class, 'update'])->name("update");
            Route::post('delete', [App\Http\Controllers\GeneralControllers\PatientController::class, 'destroy'])->name("destroy");
            Route::post('transfer', [App\Http\Controllers\GeneralControllers\PatientController::class, 'transfer'])->name("transfer");
            Route::post('send/records', [App\Http\Controllers\GeneralControllers\PatientController::class, 'send_records'])->name("send_records");
            Route::post('message', [App\Http\Controllers\GeneralControllers\PatientController::class, 'message'])->name("message");
            
        });

        Route::group(['prefix'=>'assessments','as'=> 'assessments.'], function () {
            Route::get('/', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'index'])->name("index");
            Route::any('new', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'create'])->name("create");
            Route::post('store', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'store'])->name("store");
            Route::get('show/{assessment}', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'show'])->name("show");
            Route::get('edit/{assessment}', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'edit'])->name("edit");
            Route::post('update', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'update'])->name("update");
            Route::post('delete', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'destroy'])->name("destroy");
            Route::group(['prefix'=>'appointments','as'=> 'appointments.'], function () {
                Route::post('/', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'appointments'])->name("index");
                Route::post('store', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'appointment_store'])->name("store");
                Route::post('update', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'appointment_update'])->name("update");
                Route::post('delete', [App\Http\Controllers\GeneralControllers\AssessmentController::class, 'appointment_delete'])->name("delete");
            });
        });

        Route::group(['prefix'=>'prescriptions','as'=> 'prescriptions.'], function () {
            Route::get('/', [App\Http\Controllers\GeneralControllers\PrescriptionController::class, 'index'])->name("index");
            Route::get('create', [App\Http\Controllers\GeneralControllers\PrescriptionController::class, 'create'])->name("create");
            Route::post('store', [App\Http\Controllers\GeneralControllers\PrescriptionController::class, 'store'])->name("store");
            Route::get('show', [App\Http\Controllers\GeneralControllers\PrescriptionController::class, 'show'])->name("show");
            Route::get('edit/{prescription}', [App\Http\Controllers\GeneralControllers\PrescriptionController::class, 'edit'])->name("edit");
            Route::post('update', [App\Http\Controllers\GeneralControllers\PrescriptionController::class, 'update'])->name("update");
            Route::post('delete', [App\Http\Controllers\GeneralControllers\PrescriptionController::class, 'destroy'])->name("destroy");
        });

      
        
        Route::get('inventory', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'list'])->name("inventory.index");
        Route::get('inventory/batches', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'batches'])->name("inventory.batches");
        Route::get('inventory/setup', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'start'])->name("inventory.start");
        Route::post('inventory/start/export', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'export'])->name("inventory.start.export");
        Route::post('inventory/start/import', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'import'])->name("inventory.start.import");
        Route::post('inventory/start/sample', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'sample'])->name("inventory.start.sample");
        Route::get('shelf', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'shelf'])->name("shelf");
        
        Route::group(['middleware'=>'role:director,manager'], function () {
            Route::get('suppliers', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'suppliers'])->name('suppliers');
            Route::post('supplier/save', [App\Http\Controllers\GeneralControllers\InventoryController::class, 'supplier_save'])->name('supplier.save');
        });

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
        Route::post('transfer/save_to_inventory',[App\Http\Controllers\GeneralControllers\TransferController::class, 'save_to_inventory'])->name('transfer.save_to_inventory');
        Route::post('transfer/delete',[App\Http\Controllers\GeneralControllers\TransferController::class, 'delete'])->name('transfer.delete');
        
        Route::group(['prefix'=>'sales','as'=> 'sales.'], function () {
            Route::get('/', [App\Http\Controllers\GeneralControllers\SalesController::class, 'index'])->name('index');
            Route::get('/new', [App\Http\Controllers\GeneralControllers\SalesController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\GeneralControllers\SalesController::class, 'store'])->name('store');
        });
    
    // });
});