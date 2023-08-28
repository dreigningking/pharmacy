<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebControllers\Admin\PaymentController;
use App\Http\Controllers\WebControllers\Admin\SettingsController;
use App\Http\Controllers\WebControllers\Admin\DashboardController;
use App\Http\Controllers\WebControllers\Admin\MedicinesController;
use App\Http\Controllers\WebControllers\Admin\TreatmentController;
use App\Http\Controllers\WebControllers\Admin\PharmaciesController;
use App\Http\Controllers\WebControllers\Admin\SubscriptionController;
use App\Http\Controllers\WebControllers\Admin\RolePermissionController;
use App\Http\Controllers\WebControllers\Admin\AssessmentSettingsController;


Route::group(['as'=>'admin.','middleware'=>['role:admin'] ,'prefix'=>'admin'], function () {
    Route::view('dashboard','admin.dashboard')->name('dashboard');

    Route::get('pharmacies',[PharmaciesController::class,'index'])->name('pharmacies');
    Route::get('pharmacy/{pharmacy}/details',[PharmaciesController::class,'show'])->name('pharmacy.details');
    Route::post('pharmacy/{pharmacy}/status',[PharmaciesController::class,'status'])->name('pharmacy.status');
    Route::post('pharmacy/{pharmacy}/subscription',[PharmaciesController::class,'subscription'])->name('pharmacy.subscription');
    
    Route::get('medicines/apis', [MedicinesController::class,'api'])->name('apis');
    Route::post('medicines/apis/store', [MedicinesController::class,'api_store'])->name('apis.store');
    Route::post('medicines/apis/update', [MedicinesController::class,'api_update'])->name('apis.update');
    Route::view('medicines/apis/upload_instructions', 'admin.medicines.uploads.api')->name('apis.upload_instructions');
    Route::post('medicines/apis/upload', [MedicinesController::class,'api_upload'])->name('apis.upload');
    

    Route::get('medicines/api/interactions',[MedicinesController::class,'api_interactions'])->name('api.interactions');
    Route::post('medicines/api/interactions/store',[MedicinesController::class,'api_interactions_store'])->name('api.interactions.store');
    Route::post('medicines/api/interactions/update',[MedicinesController::class,'api_interactions_update'])->name('api.interactions.update');
    Route::get('medicines/api/interactions/upload_instructions',[MedicinesController::class,'interactions_upload_instructions'])->name('api.interactions.upload_instructions');
    Route::post('medicines/api/interaction/download', [MedicinesController::class, 'api_interactions_download'])->name('api.interactions.download');
    Route::post('medicines/api/interaction/upload', [MedicinesController::class, 'api_interactions_upload'])->name('api.interactions.upload');
    
    Route::get('medicine/drugs/categories',[MedicinesController::class, 'categories'])->name('categories');
    Route::post('medicine/drugs/categories/store',[MedicinesController::class, 'categories_store'])->name('categories.store');
    Route::post('medicine/drugs/categories/update',[MedicinesController::class, 'categories_update'])->name('categories.update');

    Route::get('medicines/drugs',[MedicinesController::class, 'drugs'])->name('drugs');
    Route::post('medicines/drugs/store',[MedicinesController::class, 'drugs_store'])->name('drugs.store');
    Route::post('medicines/drugs/update',[MedicinesController::class, 'drugs_update'])->name('drugs.update');
    Route::view('medicines/drugs/upload_instructions','admin.medicines.uploads.drugs')->name('drugs.upload_instructions');
    Route::post('medicines/drugs/upload',[MedicinesController::class, 'drugs_upload'])->name('drugs.upload');
    Route::any('medicines/drugs/apimatching',[MedicinesController::class,'drugs_api_matching'])->name('drugs.apimatching');
    Route::post('medicines/drugs/api/match',[MedicinesController::class,'drugs_match'])->name('drugs.match');
    Route::get('medicines/drugs/submissions',[MedicinesController::class, 'submissions'])->name('drugs.submissions');
    
    Route::group(['as'=> 'assessments.','prefix'=> 'assessment'],function(){
        Route::view('uploads','admin.assessments.uploads')->name('upload_instructions');
        
        Route::get('complaints',[AssessmentSettingsController::class,'complaints'])->name('complaints');
        Route::post('complaints/manage',[AssessmentSettingsController::class,'complaints_manage'])->name('complaints.manage');
        Route::post('complaints/upload',[AssessmentSettingsController::class,'complaints_upload'])->name('complaints.upload');
        
        Route::get('conditions',[AssessmentSettingsController::class,'conditions'])->name('conditions');
        Route::post('conditions/manage',[AssessmentSettingsController::class,'conditions_manage'])->name('conditions.manage');
        Route::post('conditions/upload',[AssessmentSettingsController::class,'conditions_upload'])->name('conditions.upload');
        
        Route::get('errors',[AssessmentSettingsController::class,'errors'])->name('errors');
        Route::post('errors/manage',[AssessmentSettingsController::class,'errors_manage'])->name('errors.manage');
        Route::post('interventions/manage',[AssessmentSettingsController::class,'interventions_manage'])->name('interventions.manage');
        Route::post('outcomes/manage',[AssessmentSettingsController::class,'outcomes_manage'])->name('outcomes.manage');
        Route::post('errors/outcomes/interventions/upload',[AssessmentSettingsController::class,'errors_intervention_outcome_upload'])->name('errors_intervention_outcome.upload');
        
        
        Route::get('family-social-questions',[AssessmentSettingsController::class,'family_social_questions'])->name('family_social_questions');
        Route::post('family-social-questions/manage',[AssessmentSettingsController::class,'family_social_questions_manage'])->name('family_social_questions.manage');
        Route::post('family-social-questions/upload',[AssessmentSettingsController::class,'family_social_questions_upload'])->name('family_social_questions.upload');
        
        Route::get('vitals',[AssessmentSettingsController::class,'vitals'])->name('vitals');
        Route::post('vitals/manage',[AssessmentSettingsController::class,'vitals_manage'])->name('vitals.manage');
        
        Route::get('system-review-questions',[AssessmentSettingsController::class,'system_review_questions'])->name('system_review_questions');
        Route::post('system-review-questions/manage',[AssessmentSettingsController::class,'system_review_questions_manage'])->name('system_review_questions.manage');
        Route::post('system-review-questions/upload',[AssessmentSettingsController::class,'system_review_questions_upload'])->name('system_review_questions.upload');

        // Route::get('diagnoses',[AssessmentSettingsController::class,'diagnoses'])->name('diagnoses');
        Route::get('laboratory_tests',[AssessmentSettingsController::class,'labtests'])->name('labtests');
        Route::post('laboratory_tests/manage',[AssessmentSettingsController::class,'labtests_manage'])->name('labtests.manage');
        
           
    });
    
    Route::group(['as'=> 'subscriptions.','prefix'=> 'subscriptions'],function(){
        Route::get('subscribers',[SubscriptionController::class,'subscribers'])->name('subscribers');
        Route::get('licenses',[SubscriptionController::class,'licenses'])->name('licenses');
        Route::get('sms',[SubscriptionController::class,'sms'])->name('sms');
        Route::get('transactions',[SubscriptionController::class,'transactions'])->name('transactions');
    });

    Route::group(['as'=> 'roles.','prefix'=> 'roles'],function(){
        Route::get('staff', [RolePermissionController::class, 'index'])->name("staff");
        // Route::get('pharmacies', [RolePermissionController::class, 'pharmacy'])->name("pharmacy");
        Route::post('permissions', [RolePermissionController::class, 'store'])->name("permissions");
    });

    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('settings', [SettingsController::class, 'store'])->name('settings');

    Route::group(['as'=> 'users.','prefix'=> 'users'],function(){
        Route::get('/',[SettingsController::class,'admin'])->name('list');
        Route::post('manage',[SettingsController::class,'admin_manage'])->name('manage');
    });

    // Route::view('support/inbox','admin.support.inbox')->name('support.inbox');
    // Route::view('support/read','admin.support.read')->name('support.read');

    Route::post('user/save', [DashboardController::class, 'saveuser'])->name('user.save');
    
    
    // Route::get('medicine/interactions', [App\Http\Controllers\WebControllers\Admin\MedicineController::class, 'interactions'])->name('medicine.interactions');
    
    
    // Route::get('drugs/upload', [App\Http\Controllers\WebControllers\Admin\MedicineController::class, 'drugsUpload'])->name('drugs.upload');
    // Route::post('drugs/upload', [App\Http\Controllers\WebControllers\Admin\MedicineController::class, 'uploadDrug'])->name('drugs.upload');
    // Route::get('diseases', [App\Http\Controllers\WebControllers\Admin\MedicineController::class, 'diseases'])->name('diseases');
    
    
    Route::get('transactions', [PaymentController::class, 'index'])->name('payments');
    // Route::get('subscriptions', [PaymentController::class, 'subscriptions'])->name('subscriptions');

    Route::view('patients', 'admin.patients')->name('patients');

    
    
    
    
    Route::get('assessments', [TreatmentController::class, 'assessments'])->name("assessment");

    Route::get('assessment/show', [TreatmentController::class, 'showassessment'])->name("showassessment");

});