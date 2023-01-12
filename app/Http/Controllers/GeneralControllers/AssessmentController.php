<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Vital;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Complaint;
use App\Models\Condition;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FamilySocialQuestion;
use App\Models\SystemReviewQuestion;

class AssessmentController extends Controller
{


    public function index(Pharmacy $pharmacy){
        $assessments = Assessment::where('pharmacy_id',$pharmacy->id)->get();
        return view('pharmacy.assessment.list', compact('pharmacy','assessments'));
    }

    
    public function create(Pharmacy $pharmacy){
        $pateint = null;
        if(request()->patient_id){
            $pateint = Patient::find(request()->patient_id);
        }
        $medicines = Medicine::all();
        $complaints = Complaint::all();
        $conditions = Condition::all();
        $familySocialQuestions = FamilySocialQuestion::all();
        $vitals = Vital::all();
        $reviews = SystemReviewQuestion::all();
        return view('pharmacy.assessment.add', compact('pharmacy','pateint','complaints','medicines','conditions','familySocialQuestions','vitals','reviews'));
    }

    public function store(Pharmacy $pharmacy,Request $request){
        dd($request->all());
        // Patient
        if($request->patient_id){
            $patient = Patient::find($request->patient_id);
        }else{
            $patient = Patient::create(['pharmacy_id'=> $pharmacy->id,'name'=> $request->patient_name,'mobile'=> $request->patient_mobile,'email'=> $request->patient_email,'age_today'=> $request->patient_age_today,'gender'=> $request->patient_gender,'address'=> $request->patient_address,'bloodgroup'=> $request->patient_bloodgroup,'genotype'=> $request->patient_genotype]);
        }
        // -Complaint
        // -Past Medical History [show previous assessment diagnosis if treatment is completed]
        //     - if error, record
        // -Current Medical History [ongoing assessment diagnosis or ongoing treatment elsewhere]
        //     - if error, record
        // -Family & Social History
        // -Vitals
        // -System Review
        // -Summary
        // -Provisional Diagnosis
        // -Laboratory
        // -Final Diagnosis
        //     - Save & Prescribe Medicine | - Save & Schedule Next Visit
        // -Feedback
    }

    public function view(Pharmacy $pharmacy,Assessment $assessment){
        return view('pharmacy.assessment.view', compact('pharmacy','assessment'));
    }

    public function appointment(Pharmacy $pharmacy,Patient $patient){
        return 'ok';
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
