<?php

use Illuminate\Support\Facades\Route;

Route::group(['as'=>'admin.','middleware'=>['role:admin'] ,'prefix'=>'admin'], function () {
    Route::view('dashboard','admin.dashboard')->name('dashboard');

    Route::get('pharmacies',[App\Http\Controllers\WebControllers\AdminControllers\PharmaciesController::class,'index'])->name('pharmacies');
    Route::get('pharmacy/{pharmacy}/details',[App\Http\Controllers\WebControllers\AdminControllers\PharmaciesController::class,'show'])->name('pharmacy.details');
    Route::post('pharmacy/{pharmacy}/status',[App\Http\Controllers\WebControllers\AdminControllers\PharmaciesController::class,'status'])->name('pharmacy.status');
    Route::post('pharmacy/{pharmacy}/subscription',[App\Http\Controllers\WebControllers\AdminControllers\PharmaciesController::class,'subscription'])->name('pharmacy.subscription');
    
    Route::get('medicines/apis', [App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class,'api'])->name('apis');
    Route::post('medicines/apis/store', [App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class,'api_store'])->name('apis.store');
    Route::post('medicines/apis/update', [App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class,'api_update'])->name('apis.update');
    Route::view('medicines/apis/upload_instructions', 'admin.medicines.uploads.api')->name('apis.upload_instructions');
    Route::post('medicines/apis/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class,'api_upload'])->name('apis.upload');
    

    Route::get('medicines/api/interactions',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class,'api_interactions'])->name('api.interactions');
    Route::post('medicines/api/interactions/store',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class,'api_interactions_store'])->name('api.interactions.store');
    Route::post('medicines/api/interactions/update',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class,'api_interactions_update'])->name('api.interactions.update');
    Route::get('medicines/api/interactions/upload_instructions',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class,'interactions_upload_instructions'])->name('api.interactions.upload_instructions');
    Route::post('medicines/api/interaction/download', [App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class, 'api_interactions_download'])->name('api.interactions.download');
    Route::post('medicines/api/interaction/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class, 'api_interactions_upload'])->name('api.interactions.upload');
    
    Route::get('medicine/drugs/categories',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class, 'categories'])->name('categories');
    Route::post('medicine/drugs/categories/store',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class, 'categories_store'])->name('categories.store');
    Route::post('medicine/drugs/categories/update',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class, 'categories_update'])->name('categories.update');

    Route::get('medicines/drugs',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class, 'drugs'])->name('drugs');
    Route::post('medicines/drugs/store',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class, 'drugs_store'])->name('drugs.store');
    Route::post('medicines/drugs/update',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class, 'drugs_update'])->name('drugs.update');
    Route::view('medicines/drugs/upload_instructions','admin.medicines.uploads.drugs')->name('drugs.upload_instructions');
    Route::post('medicines/drugs/upload',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class, 'drugs_upload'])->name('drugs.upload');
    Route::any('medicines/drugs/apimatching',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class,'drugs_api_matching'])->name('drugs.apimatching');
    Route::post('medicines/drugs/api/match',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class,'drugs_match'])->name('drugs.match');
    
    Route::group(['as'=> 'assessments.','prefix'=> 'assessment'],function(){
        Route::get('complaints',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'complaints'])->name('complaints');
        Route::post('complaints/store',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'complaints_store'])->name('complaints.store');
        Route::post('complaints/update',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'complaints_update'])->name('complaints.update');
        Route::get('conditions',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'conditions'])->name('conditions');
        Route::get('errors',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'errors'])->name('errors');
        Route::get('family-social-questions',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'historyQuestions'])->name('family_social_questions');
        Route::get('vitals',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'vitals'])->name('vitals');
        Route::get('system-review-questions',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'reviewQuestions'])->name('system_review_questions');
        // Route::get('diagnoses',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'diagnoses'])->name('diagnoses');
        Route::get('laboratory_tests',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'labtests'])->name('labtests');
        Route::get('advises',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'advices'])->name('advises');
        Route::view('uploads','admin.assessments.uploads')->name('upload_instructions');
    });
    
    Route::view('medicines/advises/upload','admin.medicines.uploads.advises')->name('advises.upload');
    

    Route::view('subscriptions','admin.subscription.list')->name('subscriptions');
    Route::view('subscriptions/sms','admin.subscription.sms')->name('subscriptions.sms');
    Route::view('subscriptions/transactions','admin.subscription.transactions')->name('subscriptions.transactions');
    
    Route::view('users','admin.users.list')->name('users');
    Route::view('support/inbox','admin.support.inbox')->name('support.inbox');
    Route::view('support/read','admin.support.read')->name('support.read');

    Route::post('user/save', [App\Http\Controllers\WebControllers\AdminControllers\DashboardController::class, 'saveuser'])->name('user.save');
    
    
    // Route::get('medicine/interactions', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'interactions'])->name('medicine.interactions');
    
    
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