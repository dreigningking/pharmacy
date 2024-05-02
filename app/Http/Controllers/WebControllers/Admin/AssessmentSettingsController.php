<?php

namespace App\Http\Controllers\WebControllers\Admin;

use App\Models\Error;
use App\Models\Vital;
use App\Models\Advice;
use App\Models\Complaint;
use App\Models\Condition;
use App\Models\Intervention;
use Illuminate\Http\Request;
use App\Imports\ErrorsImport;
use App\Imports\AdvicesImport;
use App\Models\LaboratoryTest;
use App\Imports\OutcomesImport;
use App\Imports\ComplaintsImport;
use App\Imports\ConditionsImport;
use App\Models\InterventionOutcome;
use App\Http\Controllers\Controller;
use App\Imports\InterventionsImport;
use App\Models\FamilySocialQuestion;
use App\Models\SystemReviewQuestion;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FamilySocialQuestionsImport;
use App\Imports\SystemReviewQuestionsImport;

class AssessmentSettingsController extends Controller
{
    public function complaints(){
        $complaints = Complaint::all();
        return view('admin.assessments.complaints',compact('complaints'));
    }

    public function complaints_manage(Request $request){
        if($request->action == 'create')
        $complaint = Complaint::create(['description'=> $request->description,'status'=> $request->status]);
        elseif($request->action == 'update')
        $complaint = Complaint::where('id',$request->complaint_id)->update(['description'=> $request->description,'status'=> $request->status]);
        else
        $complaint = Complaint::destroy($request->complaint_id);
        return back();
    }

    public function complaints_upload(Request $request){
        // dd($request->all());
        try {
                Excel::import(new ComplaintsImport, $request->file('complaints'));
            }
        catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
        }
        return redirect()->route('admin.assessments.complaints');
    }

    public function conditions(){
        $conditions = Condition::all();
        return view('admin.assessments.conditions',compact('conditions'));
    }

    public function conditions_manage(Request $request){
        // dd($request->all());
        if($request->action == 'create')
        $complaint = Condition::create(['description'=> $request->description,'medical_counsel'=> explode('|',$request->medical_counsel),'status'=> $request->status]);
        elseif($request->action == 'update')
        $condition = Condition::where('id',$request->condition_id)->update(['description'=> $request->description,'medical_counsel'=> explode('|',$request->medical_counsel),'status'=> $request->status]);
        else
        $condition = Condition::destroy($request->condition_id);
        return back();
    }


    public function conditions_upload(Request $request){
        // dd($request->all());
        try {
            Excel::import(new ConditionsImport, $request->file('conditions'));
        }
        catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
        }
        return redirect()->route('admin.assessments.conditions');
    }

    public function errors(){
        $erors = Error::all();
        $interventions = Intervention::all();
        $outcomes = InterventionOutcome::all();
        return view('admin.assessments.errors',compact('erors','interventions','outcomes'));
    }

    public function errors_manage(Request $request){
        if($request->action == 'create')
        $error = Error::create(['description'=> $request->description,'type'=> $request->type,'status'=> $request->status]);
        elseif($request->action == 'update')
        $error = Error::where('id',$request->error_id)->update(['description'=> $request->description,'type'=> $request->type,'status'=> $request->status]);
        else
        $error = Error::destroy($request->error_id);
        return back();
    }


    public function interventions_manage(Request $request){
        if($request->action == 'create')
        $intervention = Intervention::create(['description'=> $request->description,'type'=> $request->type,'status'=> $request->status]);
        elseif($request->action == 'update')
        $intervention = Intervention::where('id',$request->intervention_id)->update(['description'=> $request->description,'status'=> $request->status]);
        else
        $intervention = Intervention::destroy($request->intervention_id);
        return back();
    }

    public function outcomes_manage(Request $request){
        if($request->action == 'create')
        $outcome = InterventionOutcome::create(['description'=> $request->description,'status'=> $request->status]);
        elseif($request->action == 'update')
        $outcome = InterventionOutcome::where('id',$request->outcome_id)->update(['description'=> $request->description,'status'=> $request->status]);
        else
        $outcome = InterventionOutcome::destroy($request->outcome_id);
        return back();
    }

    public function errors_intervention_outcome_upload(Request $request){
        // dd($request->has('interventions'));
        try {
                if($request->has('errors'))
                    Excel::import(new ErrorsImport, $request->file('errors'));
                if($request->has('interventions'))
                    Excel::import(new InterventionsImport, $request->file('interventions'));
                if($request->has('outcomes'))
                    Excel::import(new OutcomesImport, $request->file('outcomes'));
            }
        catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
        }
        return redirect()->route('admin.assessments.errors');
    }

    public function family_social_questions(){
        $questions = FamilySocialQuestion::all();
        return view('admin.assessments.family_social_questions',compact('questions'));
    }

    public function family_social_questions_manage(Request $request){
        // dd($request->all());
        if($request->action == 'create')
        $question = FamilySocialQuestion::create(['description'=> $request->description,'status'=> $request->status]);
        elseif($request->action == 'update')
        $question = FamilySocialQuestion::where('id',$request->question_id)->update(['description'=> $request->description,'status'=> $request->status]);
        else
        $question = FamilySocialQuestion::destroy($request->question_id);
        return back();
    }

    public function family_social_questions_upload(Request $request){
        try {
            Excel::import(new FamilySocialQuestionsImport, $request->file('questions'));
        }
        catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
        }
        return redirect()->route('admin.assessments.family_social_questions');
    }

    public function vitals(){
        $vitals = Vital::all();
        return view('admin.assessments.vitals',compact('vitals'));
    }

    public function vitals_manage(Request $request){
        if($request->action == 'create')
        $vitals = Vital::create(['type'=> $request->type,'inputs'=> $request->inputs,'status'=> $request->status]);
        elseif($request->action == 'update')
        $vitals = Vital::where('id',$request->vital_id)->update(['type'=> $request->type,'inputs'=> $request->inputs,'status'=> $request->status]);
        else
        $vitals = Vital::destroy($request->vital_id);
        return back();
    }


    public function system_review_questions(){
        $questions = SystemReviewQuestion::all();
        return view('admin.assessments.system_review_questions',compact('questions'));
    }

    public function system_review_questions_manage(Request $request){
        
        if($request->action == 'create')
        $questions = SystemReviewQuestion::create(['description'=> $request->description,'system'=> $request->system,'status'=> $request->status]);
        elseif($request->action == 'update')
        $questions = SystemReviewQuestion::where('id',$request->question_id)->update(['description'=> $request->description,'system'=> $request->system,'status'=> $request->status]);
        else
        $questions = SystemReviewQuestion::destroy($request->question_id);
        return back();
    }


    public function system_review_questions_upload(Request $request){
        try {
            Excel::import(new SystemReviewQuestionsImport, $request->file('questions'));
        }
        catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
        }
        return redirect()->route('admin.assessments.system_review_questions');
    }

    public function labtests(){
        $tests = LaboratoryTest::all();
        return view('admin.assessments.laboratory',compact('tests'));
    }

    public function labtests_manage(Request $request){
        if($request->action == 'create')
        $test = LaboratoryTest::create(['name'=> $request->name,'category'=> $request->category,'status'=> $request->status]);
        elseif($request->action == 'update')
        $test = LaboratoryTest::where('id',$request->test_id)->update(['name'=> $request->name,'category'=> $request->category,'status'=> $request->status]);
        else
        $test = LaboratoryTest::destroy($request->test_id);
        return back();
    }
 
}
