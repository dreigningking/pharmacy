<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralControllers\SalesController;
use App\Http\Controllers\GeneralControllers\StaffController;
use App\Http\Controllers\GeneralControllers\SupplyController;
use App\Http\Controllers\GeneralControllers\PatientController;
use App\Http\Controllers\GeneralControllers\PharmacyController;
use App\Http\Controllers\GeneralControllers\TransferController;
use App\Http\Controllers\GeneralControllers\InventoryController;
use App\Http\Controllers\GeneralControllers\AssessmentController;
use App\Http\Controllers\GeneralControllers\PrescriptionController;
// 'middleware'=>['pharmacy'] ,
Route::group(['as'=>'pharmacy.','prefix'=>'pharmacy/{pharmacy}'], function () {

    //  Route::group(['middleware'=>['subscription']], function () {
        Route::get('dashboard', [PharmacyController::class, 'index'])->name('dashboard');
        Route::get('notifications', [PharmacyController::class, 'notifications'])->name('notifications');
        Route::get('settings', [PharmacyController::class, 'settings'])->name("settings");
        Route::post('settings', [PharmacyController::class, 'settings'])->name("settings");
        
        Route::group(['middleware'=>'role:director,manager','as'=> 'staff.'], function () {
            Route::post('staff',[StaffController::class, 'store'])->name("store");
            Route::post('staff/destroy',[StaffController::class, 'destroy'])->name("destroy");
            Route::get('activities', [StaffController::class, 'activities'])->name("activities");
        });
        
        Route::group(['prefix'=>'patients','as'=> 'patients.'], function () {
            Route::get('/', [PatientController::class, 'index'])->name("index");
            Route::get('view/{patient}', [PatientController::class, 'view'])->name("view");        
            // Route::get('new', [PatientController::class, 'create'])->name("create");
            Route::post('store', [PatientController::class, 'store'])->name("store");
            Route::post('update', [PatientController::class, 'update'])->name("update");
            Route::post('delete', [PatientController::class, 'destroy'])->name("destroy");
            Route::post('transfer', [PatientController::class, 'transfer'])->name("transfer");
            Route::post('send/records', [PatientController::class, 'send_records'])->name("send_records");
            Route::post('message', [PatientController::class, 'message'])->name("message");
            
        });

        Route::group(['prefix'=>'assessments','as'=> 'assessments.'], function () {
            Route::get('/', [AssessmentController::class, 'index'])->name("index");
            Route::get('new/{patient?}', [AssessmentController::class, 'create'])->name("create");
            Route::post('store', [AssessmentController::class, 'store'])->name("store");
            Route::get('show/{assessment?}', [AssessmentController::class, 'show'])->name("show");
            Route::get('edit/{assessment?}', [AssessmentController::class, 'edit'])->name("edit");
            Route::post('update', [AssessmentController::class, 'update'])->name("update");
            Route::post('delete', [AssessmentController::class, 'destroy'])->name("destroy");
            
        });

        Route::group(['prefix'=>'prescriptions','as'=> 'prescriptions.'], function () {
            Route::get('/', [PrescriptionController::class, 'index'])->name("index");
            Route::get('create/{assessment?}', [PrescriptionController::class, 'create'])->name("create");
            Route::post('store', [PrescriptionController::class, 'store'])->name("store");
            Route::get('show', [PrescriptionController::class, 'show'])->name("show");
            Route::get('edit/{prescription}', [PrescriptionController::class, 'edit'])->name("edit");
            Route::post('update', [PrescriptionController::class, 'update'])->name("update");
            Route::post('delete', [PrescriptionController::class, 'destroy'])->name("destroy");
        });

        Route::group(['prefix'=>'sales','as'=> 'sales.'], function () {
            Route::get('/', [SalesController::class, 'index'])->name('index');
            Route::get('/new', [SalesController::class, 'create'])->name('create');
            Route::post('/store', [SalesController::class, 'store'])->name('store');
        });
      
        Route::group(['prefix'=>'inventory','as'=> 'inventory.'], function () {
            Route::get('/', [InventoryController::class,'list'])->name("index");
            Route::get('add/drugs',[InventoryController::class,'drugs'] )->name('drugs');
            Route::get('view/{item}', [InventoryController::class,'show'])->name("show");
            Route::post('store', [InventoryController::class, 'store'])->name("store");
            
            Route::post('storemany', [InventoryController::class, 'storemany'])->name("store");
            Route::get('settings', [InventoryController::class, 'settings'])->name("settings");

            Route::get('getBatches',[TransferController::class, 'batches'])->name('batches');
            Route::get('setup', [InventoryController::class, 'start'])->name("start");
            Route::post('start/export', [InventoryController::class, 'export'])->name("start.export");
            Route::post('start/import', [InventoryController::class, 'import'])->name("start.import");
            Route::post('start/sample', [InventoryController::class, 'sample'])->name("start.sample");

       
            Route::group(['prefix'=>'transfers','as'=> 'transfers.'], function () {
                Route::get('/',[TransferController::class, 'list'])->name('list');
                Route::get('new',[TransferController::class, 'create'])->name('create');
                Route::post('new',[TransferController::class, 'create_from_inventory'])->name('create');
                Route::get('{transfer}/edit',[TransferController::class, 'edit'])->name('edit');
                Route::post('{transfer}/update',[TransferController::class, 'update'])->name('update');
                Route::post('save',[TransferController::class, 'store'])->name('store');
                Route::post('save_to_inventory',[TransferController::class, 'save_to_inventory'])->name('save_to_inventory');
                Route::post('delete',[TransferController::class, 'delete'])->name('delete');
            });

            Route::group(['prefix'=>'purchases','as'=> 'purchases.'], function () {
                Route::get('/',[SupplyController::class, 'list'])->name('list');
                Route::get('new',[SupplyController::class, 'create'])->name('create');
                Route::post('new',[SupplyController::class, 'create_from_inventory'])->name('create');
                Route::get('{purchase}/edit',[SupplyController::class, 'edit'])->name('edit');
                Route::post('{purchase}/update',[SupplyController::class, 'update'])->name('update');
                Route::post('save',[SupplyController::class, 'store'])->name('store');
                Route::get('{purchase}/add_to_inventory',[SupplyController::class, 'add_to_inventory'])->name('add_to_inventory');
                Route::post('save_to_inventory',[SupplyController::class, 'save_to_inventory'])->name('save_to_inventory');
                Route::post('delete',[SupplyController::class, 'delete'])->name('delete');
            });

        });

        Route::group(['middleware'=>'role:director,manager'], function () {
            Route::get('suppliers', [InventoryController::class, 'suppliers'])->name('suppliers');
            Route::post('supplier/save', [InventoryController::class, 'supplier_save'])->name('supplier.save');
        });
 
    // });

});