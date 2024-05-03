<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\General\SalesController;
use App\Http\Controllers\General\StaffController;
use App\Http\Controllers\General\SupplyController;
use App\Http\Controllers\General\PatientController;
use App\Http\Controllers\General\PharmacyController;
use App\Http\Controllers\General\TransferController;
use App\Http\Controllers\General\AnalyticsController;
use App\Http\Controllers\General\InventoryController;
use App\Http\Controllers\General\AssessmentController;
use App\Http\Controllers\General\PrescriptionController;

Route::group(['prefix'=> 'pharmacy','as'=> 'pharmacy.'],function(){
    Route::get('setup',[PharmacyController::class,'create'])->name('setup');
    Route::post('setup',[PharmacyController::class,'store'])->name('setup');
    Route::post('update',[PharmacyController::class,'update'])->name('update');
    Route::post('destroy',[PharmacyController::class,'destroy'])->name('destroy');
});


Route::group(['middleware'=> ['auth','pharmacy','subscription'],'as'=>'pharmacy.','prefix'=>'pharmacy/{pharmacy}'], function () {

    //  Route::group(['middleware'=>['subscription']], function () {
    Route::get('dashboard', [PharmacyController::class,'index'])->name('dashboard');
    Route::get('notifications', [PharmacyController::class,'notifications'])->name('notifications');
    Route::get('settings', [PharmacyController::class,'settings'])->name("settings");
    Route::post('settings/basic', [PharmacyController::class,'update'])->name("settings.update");
    Route::post('settings/others', [PharmacyController::class,'others'])->name("settings.others");
    
    Route::group(['as'=> 'staff.','prefix' => 'staff'], function () {
        Route::post('store',[StaffController::class, 'store'])->name("store");
        // Route::post('destroy',[StaffController::class, 'destroy'])->name("destroy");
        Route::get('activities', [StaffController::class, 'activities'])->name("activities");
    });
    
    Route::group(['prefix'=>'patients','as'=> 'patients.'], function () {
        Route::get('/', [PatientController::class, 'index'])->name("index");
        Route::get('view/{patient}', [PatientController::class, 'view'])->name("view");        
        Route::post('update', [PatientController::class, 'update'])->name("update");
        Route::post('transfer', [PatientController::class, 'transfer'])->name("create");
        Route::post('store', [PatientController::class, 'store'])->name("store");
        Route::post('delete', [PatientController::class, 'destroy'])->name("destroy");
        Route::post('transfer', [PatientController::class, 'transfer'])->name("transfer");
        Route::post('send/records', [PatientController::class, 'send_records'])->name("send_records");
        Route::post('message', [PatientController::class, 'message'])->name("message");
        
    });

    Route::group(['prefix'=>'assessments','as'=> 'assessments.'], function () {
        Route::get('/', [AssessmentController::class, 'index'])->name("index");
        Route::get('new/{patient?}', [AssessmentController::class, 'create'])->name("create");
        Route::post('store', [AssessmentController::class, 'store'])->name("store");
        Route::get('show/{assessment}', [AssessmentController::class, 'show'])->name("show");
        // Route::get('edit/{assessment}', [AssessmentController::class, 'edit'])->name("edit");
        Route::post('delete', [AssessmentController::class, 'destroy'])->name("destroy");
        Route::get('{assessment}/vitals', [AssessmentController::class, 'vitals'])->name("vitals");
        Route::post('vitals', [AssessmentController::class, 'vitals_store'])->name("vitals_store");

        Route::get('{assessment}/medical_medication', [AssessmentController::class, 'medical_medication'])->name("medical_medication");
        Route::post('medical_medication', [AssessmentController::class, 'medical_medication_store'])->name("medical_medication_store");

        Route::get('{assessment}/family_history', [AssessmentController::class, 'family_history'])->name("family_history");
        Route::post('family_history', [AssessmentController::class, 'family_history_store'])->name("family_history_store");

        Route::get('{assessment}/system_review', [AssessmentController::class, 'system_review'])->name("system_review");
        Route::post('system_review', [AssessmentController::class, 'system_review_store'])->name("system_review_store");

        Route::get('{assessment}/provisional_diagnosis', [AssessmentController::class, 'provisional_diagnosis'])->name("provisional_diagnosis");
        Route::post('provisional_diagnosis', [AssessmentController::class, 'provisional_diagnosis_store'])->name("provisional_diagnosis_store");

        Route::get('{assessment}/laboratory_test', [AssessmentController::class, 'laboratory_test'])->name("laboratory_test");
        Route::post('laboratory_test', [AssessmentController::class, 'laboratory_test_store'])->name("laboratory_test_store");

        Route::get('{assessment}/final_diagnosis', [AssessmentController::class, 'final_diagnosis'])->name("final_diagnosis");
        Route::post('final_diagnosis', [AssessmentController::class, 'final_diagnosis_store'])->name("final_diagnosis_store");

    });

    Route::group(['prefix'=>'prescriptions','as'=> 'prescriptions.'], function () {
        Route::get('/', [PrescriptionController::class, 'index'])->name("index");
        Route::get('create-new', [PrescriptionController::class, 'create_new'])->name("create.new");
        Route::get('create', [PrescriptionController::class, 'create_with_data'])->name("create");
        Route::post('store', [PrescriptionController::class, 'store'])->name("store");
        Route::get('show', [PrescriptionController::class, 'show'])->name("show");
        Route::get('edit/{prescription}', [PrescriptionController::class, 'edit'])->name("edit");
        Route::post('update', [PrescriptionController::class, 'update'])->name("update");
        Route::post('delete', [PrescriptionController::class, 'destroy'])->name("destroy");
    });

    Route::group(['prefix'=>'sales','as'=> 'sales.'], function () {
        Route::get('/', [SalesController::class, 'index'])->name('index');
        Route::get('new/{prescription?}', [SalesController::class, 'create'])->name('create');
        Route::get('edit/{sale}', [SalesController::class, 'edit'])->name('edit');
        Route::get('show', [SalesController::class, 'show'])->name('show');
        Route::post('store', [SalesController::class, 'store'])->name('store');
        Route::post('update', [SalesController::class, 'update'])->name('update');
    });
    
    Route::group(['prefix'=>'inventory','as'=> 'inventory.'], function () {
        Route::get('/', [InventoryController::class,'list'])->name("index");
        Route::get('expired', [InventoryController::class,'expired'])->name("expired");
        Route::get('expiring-soon', [InventoryController::class,'expiringSoon'])->name("expiring_soon");
        Route::get('out-of-stock', [InventoryController::class,'outOfStock'])->name("out_of_stock");
        Route::get('over-stocked', [InventoryController::class,'overStocked'])->name("over_stocked");
        Route::get('under-stocked', [InventoryController::class,'underStocked'])->name("under_stocked");
        Route::get('add/drugs',[InventoryController::class,'drugs'] )->name('drugs');
        Route::get('view/{item}', [InventoryController::class,'show'])->name("show");
        Route::post('store', [InventoryController::class,'store'])->name("store");
        Route::post('update', [InventoryController::class,'update'])->name("update");
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
        Route::post('update',[TransferController::class, 'update'])->name('update');
        Route::post('save',[TransferController::class, 'store'])->name('store');
        Route::post('save_to_inventory',[TransferController::class, 'save_to_inventory'])->name('save_to_inventory');
        Route::post('delete',[TransferController::class, 'delete'])->name('delete');
        Route::get('view/{transfer}',[TransferController::class, 'show'])->name('show');
    });

    Route::group(['prefix'=>'purchases','as'=> 'purchases.'], function () {
        Route::get('/',[SupplyController::class, 'list'])->name('list');
        Route::get('new',[SupplyController::class, 'create'])->name('create');
        Route::post('new',[SupplyController::class, 'create_from_inventory'])->name('create');
        Route::get('{purchase}/edit',[SupplyController::class, 'edit'])->name('edit');
        Route::post('update',[SupplyController::class, 'update'])->name('update');
        Route::post('save',[SupplyController::class, 'store'])->name('store');
        Route::get('{purchase}/add_to_inventory',[SupplyController::class, 'add_to_inventory'])->name('add_to_inventory');
        Route::post('save_to_inventory',[SupplyController::class, 'save_to_inventory'])->name('save_to_inventory');
        Route::post('delete',[SupplyController::class, 'delete'])->name('delete');
        Route::get('view/{purchase}',[SupplyController::class, 'show'])->name('show');
    });

    Route::group(['prefix'=>'analytics','as'=> 'analytics.'], function () {
        Route::post('/patient-individual',[AnalyticsController::class, 'patient_individual'])->name('patient_individual');
        Route::get('/medication-outcome-monitor',[AnalyticsController::class, 'medications_monitor'])->name('medications_monitor');
        Route::get('diagnosis-monitor',[AnalyticsController::class, 'diagnosis_monitor'])->name('diagnosis_monitor');
        Route::get('/sales-modality',[AnalyticsController::class, 'sales_modality'])->name('sales_modality');
        Route::get('periodic-sales-monitor',[AnalyticsController::class, 'periodic_sales_monitor'])->name('periodic_sales_monitor');
        Route::get('sales-volume-monitor',[AnalyticsController::class, 'sales_volume_monitor'])->name('sales_volume_monitor');
        Route::get('earnings-per-product',[AnalyticsController::class, 'earnings_per_product'])->name('earnings_per_product');
        Route::get('business-capitalization',[AnalyticsController::class, 'business_capitalization'])->name('business_capitalization');
        Route::get('expiring-products',[AnalyticsController::class, 'expiring_products'])->name('expiring_products');
        Route::get('expired-products',[AnalyticsController::class, 'expired_products'])->name('expired_products');

        
    });

    

});