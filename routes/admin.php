<?php

use Illuminate\Support\Facades\Route;

Route::group(['as'=>'admin.','middleware'=>['role:admin'] ,'prefix'=>'admin'], function () {
    // Route::get('loanapplication',[App\Http\Controllers\PagesController::class, 'rejected_applications'])->name("rejected_applications");
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
    Route::get('medicines/drugs/submissions',[App\Http\Controllers\WebControllers\AdminControllers\MedicinesController::class, 'submissions'])->name('drugs.submissions');
    
    Route::group(['as'=> 'assessments.','prefix'=> 'assessment'],function(){
        Route::view('uploads','admin.assessments.uploads')->name('upload_instructions');
        
        Route::get('complaints',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'complaints'])->name('complaints');
        Route::post('complaints/manage',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'complaints_manage'])->name('complaints.manage');
        Route::post('complaints/upload',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'complaints_upload'])->name('complaints.upload');
        
        Route::get('conditions',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'conditions'])->name('conditions');
        Route::post('conditions/manage',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'conditions_manage'])->name('conditions.manage');
        Route::post('conditions/upload',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'conditions_upload'])->name('conditions.upload');
        
        Route::get('errors',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'errors'])->name('errors');
        Route::post('errors/manage',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'errors_manage'])->name('errors.manage');
        Route::post('interventions/manage',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'interventions_manage'])->name('interventions.manage');
        Route::post('outcomes/manage',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'outcomes_manage'])->name('outcomes.manage');
        Route::post('errors/outcomes/interventions/upload',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'errors_intervention_outcome_upload'])->name('errors_intervention_outcome.upload');
        
        
        Route::get('family-social-questions',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'family_social_questions'])->name('family_social_questions');
        Route::post('family-social-questions/manage',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'family_social_questions_manage'])->name('family_social_questions.manage');
        Route::post('family-social-questions/upload',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'family_social_questions_upload'])->name('family_social_questions.upload');
        
        Route::get('vitals',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'vitals'])->name('vitals');
        Route::post('vitals/manage',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'vitals_manage'])->name('vitals.manage');
        
        Route::get('system-review-questions',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'system_review_questions'])->name('system_review_questions');
        Route::post('system-review-questions/manage',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'system_review_questions_manage'])->name('system_review_questions.manage');
        Route::post('system-review-questions/upload',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'system_review_questions_upload'])->name('system_review_questions.upload');

        // Route::get('diagnoses',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'diagnoses'])->name('diagnoses');
        Route::get('laboratory_tests',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'labtests'])->name('labtests');
        Route::post('laboratory_tests/manage',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'labtests_manage'])->name('labtests.manage');
        
        Route::get('advices',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'advices'])->name('advices');
        Route::post('advices/manage',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'advices_manage'])->name('advices.manage');
        Route::post('advices/upload',[App\Http\Controllers\WebControllers\AdminControllers\AssessmentSettingsController::class,'advices_upload'])->name('advices.upload');
        
    });
    
    Route::group(['as'=> 'subscriptions.','prefix'=> 'subscriptions'],function(){
        Route::get('subscribers',[App\Http\Controllers\WebControllers\AdminControllers\SubscriptionController::class,'subscribers'])->name('subscribers');
        Route::get('licenses',[App\Http\Controllers\WebControllers\AdminControllers\SubscriptionController::class,'licenses'])->name('licenses');
        Route::get('sms',[App\Http\Controllers\WebControllers\AdminControllers\SubscriptionController::class,'sms'])->name('sms');
        Route::get('transactions',[App\Http\Controllers\WebControllers\AdminControllers\SubscriptionController::class,'transactions'])->name('transactions');
    });

    Route::group(['as'=> 'roles.','prefix'=> 'roles'],function(){
        Route::get('staff', [App\Http\Controllers\WebControllers\AdminControllers\RolePermissionController::class, 'index'])->name("staff");
        Route::get('pharmacies', [App\Http\Controllers\WebControllers\AdminControllers\RolePermissionController::class, 'pharmacy'])->name("pharmacy");
        Route::post('permissions', [App\Http\Controllers\WebControllers\AdminControllers\RolePermissionController::class, 'store'])->name("permissions");
    });

    Route::get('settings', [App\Http\Controllers\WebControllers\AdminControllers\SettingsController::class, 'index'])->name('settings');
    Route::post('settings', [App\Http\Controllers\WebControllers\AdminControllers\SettingsController::class, 'store'])->name('settings');

    Route::group(['as'=> 'users.','prefix'=> 'users'],function(){
        Route::get('/',[App\Http\Controllers\WebControllers\AdminControllers\SettingsController::class,'admin'])->name('list');
        Route::post('manage',[App\Http\Controllers\WebControllers\AdminControllers\SettingsController::class,'admin_manage'])->name('manage');
    });

    Route::view('support/inbox','admin.support.inbox')->name('support.inbox');
    Route::view('support/read','admin.support.read')->name('support.read');

    Route::post('user/save', [App\Http\Controllers\WebControllers\AdminControllers\DashboardController::class, 'saveuser'])->name('user.save');
    
    
    // Route::get('medicine/interactions', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'interactions'])->name('medicine.interactions');
    
    
    // Route::get('drugs/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'drugsUpload'])->name('drugs.upload');
    // Route::post('drugs/upload', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'uploadDrug'])->name('drugs.upload');
    // Route::get('diseases', [App\Http\Controllers\WebControllers\AdminControllers\MedicineController::class, 'diseases'])->name('diseases');
    
    
    Route::get('transactions', [App\Http\Controllers\WebControllers\AdminControllers\PaymentController::class, 'index'])->name('payments');
    // Route::get('subscriptions', [App\Http\Controllers\WebControllers\AdminControllers\PaymentController::class, 'subscriptions'])->name('subscriptions');

    Route::view('patients', 'admin.patients')->name('patients');

    
    
    
    
    Route::get('assessments', [App\Http\Controllers\WebControllers\AdminControllers\TreatmentController::class, 'assessments'])->name("assessment");

    Route::get('assessment/show', [App\Http\Controllers\WebControllers\AdminControllers\TreatmentController::class, 'showassessment'])->name("showassessment");

});