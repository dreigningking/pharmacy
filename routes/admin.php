<?php

use Illuminate\Support\Facades\Route;

Route::group(['as'=>'admin.','middleware'=>['role:admin'] ,'prefix'=>'admin'], function () {
    Route::view('dashboard','admin.dashboard')->name('dashboard');
    Route::view('pharmacies', 'admin.pharmacy.list')->name('pharmacies');
    Route::view('pharmacy/details', 'admin.pharmacy.view')->name('pharmacy.details');
    Route::view('medicines/apis', 'admin.medicines.api')->name('apis');
    Route::view('medicines/apis/upload', 'admin.medicines.uploads.api')->name('apis.upload');
    Route::view('medicines/drugs','admin.medicines.drugs')->name('drugs');
    Route::view('medicines/drugs/upload','admin.medicines.uploads.drugs')->name('drugs.upload');
    Route::view('medicines/drugs/apimatching','admin.medicines.apimatching')->name('drugs.apimatching');
    Route::view('medicine/drugs/categories','admin.medicines.categories')->name('categories');
    Route::view('medicines/api/interactions','admin.medicines.interactions')->name('interactions');
    Route::view('medicines/api/interactions/upload','admin.medicines.uploads.interactions')->name('interactions.upload');
    Route::view('medicines/advises/upload','admin.medicines.uploads.advises')->name('advises.upload');

    Route::view('assessment/complaints','admin.assessments.complaints')->name('assessments.complaints');
    Route::view('assessment/conditions','admin.assessments.conditions')->name('assessments.conditions');
    Route::view('assessment/errors','admin.assessments.errors')->name('assessments.errors');
    Route::view('assessment/family-social-questions','admin.assessments.family_social_questions')->name('assessments.family_social_questions');
    Route::view('assessment/vitals','admin.assessments.vitals')->name('assessments.vitals');
    Route::view('assessment/system-review-questions','admin.assessments.system_review_questions')->name('assessments.system_review_questions');
    Route::view('assessment/diagnosis','admin.assessments.diagnosis')->name('assessments.diagnosis');
    Route::view('assessment/laboratory','admin.assessments.laboratory')->name('assessments.laboratory');
    Route::view('assessment/advises','admin.assessments.advises')->name('assessments.advises');
    Route::view('assessment/uploads','admin.assessments.uploads')->name('assessments.uploads');

    Route::view('subscriptions','admin.subscription.list')->name('subscriptions');
    Route::view('subscriptions/sms','admin.subscription.sms')->name('subscriptions.sms');
    Route::view('subscriptions/transactions','admin.subscription.transactions')->name('subscriptions.transactions');
    
    Route::view('users','admin.users.list')->name('users');
    Route::view('support/inbox','admin.support.inbox')->name('support.inbox');
    Route::view('support/read','admin.support.read')->name('support.read');

    Route::post('user/save', [App\Http\Controllers\WebControllers\AdminControllers\DashboardController::class, 'saveuser'])->name('user.save');
    
    
    // Route::get('medicine/interactions', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'interactions'])->name('medicine.interactions');
    
    Route::post('medicines/relationship/download', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'downloadRelationship'])->name('medicines.downloadrelationship');
    Route::post('medicines/relationship/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'uploadRelationship'])->name('medicines.uploadrelationship');
    
    
    // Route::get('drugs/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'drugsUpload'])->name('drugs.upload');
    // Route::post('drugs/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'uploadDrug'])->name('drugs.upload');
    // Route::get('diseases', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'diseases'])->name('diseases');
    
    Route::get('settings', [App\Http\Controllers\WebControllers\AdminControllers\SettingsController::class, 'index'])->name('settings');

    Route::get('transactions', [App\Http\Controllers\WebControllers\AdminControllers\PaymentController::class, 'index'])->name('payments');
    // Route::get('subscriptions', [App\Http\Controllers\WebControllers\AdminControllers\PaymentController::class, 'subscriptions'])->name('subscriptions');

    Route::view('patients', 'admin.patients')->name('patients');

    
    
    Route::get('roles/staff', [App\Http\Controllers\WebControllers\AdminControllers\RolePermissionController::class, 'index'])->name("roles.staff");
    Route::get('roles/pharmacies', [App\Http\Controllers\WebControllers\AdminControllers\RolePermissionController::class, 'pharmacy'])->name("roles.pharmacy");
    Route::post('permissions', [App\Http\Controllers\WebControllers\AdminControllers\RolePermissionController::class, 'store'])->name("permissions");
    
    Route::get('assessments', [App\Http\Controllers\WebControllers\AdminControllers\TreatmentController::class, 'assessments'])->name("assessment");

    Route::get('assessment/show', [App\Http\Controllers\WebControllers\AdminControllers\TreatmentController::class, 'showassessment'])->name("showassessment");

});