<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Models\Complaint;
use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\Diagnosis;
use App\Models\Error;
use App\Models\FamilySocialQuestion;
use App\Models\Intervention;
use App\Models\InterventionOutcome;
use App\Models\LaboratoryTest;
use App\Models\SystemReviewQuestion;
use App\Models\Vital;

class AssessmentSettingsController extends Controller
{
    public function complaints(){
        $complaints = Complaint::all();
        return view('admin.assessments.complaints',compact('complaints'));
    }

    public function complaints_store(){

    }

    public function complaints_update(){

    }

    public function complaints_delete(){

    }

    public function complaints_upload(){

    }

    public function conditions(){
        $conditions = Condition::all();
        return view('admin.assessments.conditions',compact('conditions'));
    }

    public function conditions_store(){

    }

    public function conditions_update(){

    }

    public function conditions_delete(){

    }

    public function conditions_upload(){
        
    }

    public function errors(){
        $erors = Error::all();
        $interventions = Intervention::all();
        $outcomes = InterventionOutcome::all();
        return view('admin.assessments.errors',compact('erors','interventions','outcomes'));
    }

    public function errors_store(){

    }


    public function errors_update(){

    }

    public function errors_delete(){

    }

    public function errors_upload(){
        
    }

    public function historyQuestions(){
        $questions = FamilySocialQuestion::all();
        return view('admin.assessments.family_social_questions',compact('questions'));
    }

    public function historyQuestions_store(){

    }


    public function historyQuestions_update(){

    }

    public function historyQuestions_delete(){

    }

    public function historyQuestions_upload(){
        
    }

    public function vitals(){
        $vitals = Vital::all();
        return view('admin.assessments.vitals',compact('vitals'));
    }

    public function vitals_store(){

    }


    public function vitals_update(){

    }

    public function vitals_delete(){

    }

    public function reviewQuestions(){
        $questions = SystemReviewQuestion::all();
        return view('admin.assessments.system_review_questions',compact('questions'));
    }

    public function reviewQuestions_store(){

    }


    public function reviewQuestions_update(){

    }

    public function reviewQuestions_delete(){

    }

    public function diagnoses(){
        $diagnoses = Diagnosis::all();
        return view('admin.assessments.diagnoses',compact('diagnoses'));
    }

    public function diagnoses_store(){

    }


    public function diagnoses_update(){

    }

    public function diagnoses_delete(){

    }

    public function labtests(){
        $tests = LaboratoryTest::all();
        return view('admin.assessments.laboratory',compact('tests'));
    }

    public function labtests_store(){

    }


    public function labtests_update(){

    }

    public function labtests_delete(){

    }

    public function advices(){
        $advices = Advice::all();
        return view('admin.assessments.advises',compact('advices'));
    }
    public function advices_store(){

    }


    public function advices_update(){

    }

    public function advices_delete(){

    }

    public function advices_upload(){

    }
    
    
}
