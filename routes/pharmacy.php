<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\General\SalesController;
use App\Http\Controllers\General\StaffController;
use App\Http\Controllers\General\SupplyController;
use App\Http\Controllers\General\PatientController;
use App\Http\Controllers\General\PharmacyController;
use App\Http\Controllers\General\TransferController;
use App\Http\Controllers\General\InventoryController;
use App\Http\Controllers\General\AssessmentController;
use App\Http\Controllers\General\PrescriptionController;

Route::group(['prefix'=> 'pharmacy','as'=> 'pharmacy.'],function(){
    Route::get('setup',[PharmacyController::class,'create'])->name('setup');
    Route::post('setup',[PharmacyController::class,'store'])->name('setup');
    Route::post('update',[PharmacyController::class,'update'])->name('update');
    Route::post('destroy',[PharmacyController::class,'destroy'])->name('destroy');
});


Route::group(['middleware'=> ['auth','subscription'],'as'=>'pharmacy.','prefix'=>'pharmacy/{pharmacy}'], function () {

    //  Route::group(['middleware'=>['subscription']], function () {
    Route::get('dashboard', [PharmacyController::class,'index'])->name('dashboard');
    Route::get('notifications', [PharmacyController::class,'notifications'])->name('notifications');
    Route::get('settings', [PharmacyController::class,'settings'])->name("settings");
    Route::post('settings/basic', [PharmacyController::class,'update'])->name("settings.update");
    Route::post('settings/others', [PharmacyController::class,'others'])->name("settings.others");
    
    Route::group(['as'=> 'staff.','prefix' => 'staff'], function () {
        Route::post('store',[StaffController::class, 'store'])->name("store");
        Route::post('destroy',[StaffController::class, 'destroy'])->name("destroy");
        Route::get('activities', [StaffController::class, 'activities'])->name("activities");
    });
    
    Route::group(['prefix'=>'patients','as'=> 'patients.'], function () {
        Route::get('/', [PatientController::class, 'index'])->name("index");
        Route::get('view/{patient}', [PatientController::class, 'view'])->name("view");        
        Route::get('new', [PatientController::class, 'create'])->name("create");
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
        Route::get('new', [SalesController::class, 'create'])->name('create');
        Route::get('show', [SalesController::class, 'show'])->name('show');
        Route::post('store', [SalesController::class, 'store'])->name('store');
    });
    
    Route::group(['prefix'=>'inventory','as'=> 'inventory.'], function () {
        Route::get('/', [InventoryController::class,'list'])->name("index");
        Route::get('add/drugs',[InventoryController::class,'drugs'] )->name('drugs');
        Route::get('view/{item}', [InventoryController::class,'show'])->name("show");
        Route::post('store', [InventoryController::class,'store'])->name("store");
        Route::post('batches', [InventoryController::class,'batches'])->name("batches");
        Route::get('settings', [InventoryController::class,'settings'])->name("settings");
        Route::post('supplier/save', [InventoryController::class, 'suppliers'])->name('suppliers');
        Route::post('import', [InventoryController::class, 'import'])->name("import");
        Route::get('setup', [InventoryController::class, 'start'])->name("start");
        Route::post('start/export', [InventoryController::class, 'export'])->name("start.export");
    });

    Route::group(['prefix'=>'transfer','as'=> 'transfer.'], function () {
        Route::get('getBatches',[TransferController::class, 'batches'])->name('batches');
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