<?php

namespace App\Http\Controllers\General;

use App\Models\Drug;
use App\Models\Vital;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Complaint;
use App\Models\Condition;
use App\Models\Inventory;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Models\PatientVitals;
use App\Models\LaboratoryTest;
use App\Models\PatientSystemReview;
use App\Http\Controllers\Controller;
use App\Models\FamilySocialQuestion;
use App\Models\SystemReviewQuestion;
use App\Models\PatientFinalDiagnosis;
use App\Models\PatientMedicalHistory;
use App\Models\PatientLaboratoryResult;
use App\Models\PatientMedicationHistory;
use App\Models\PatientFamilySocialHistory;
use App\Models\PatientProvisionalDiagnosis;

class AssessmentController extends Controller
{


    public function index(Pharmacy $pharmacy){
        $assessments = Assessment::where('pharmacy_id',$pharmacy->id)->get();
        return view('pharmacy.assessment.list', compact('pharmacy','assessments'));
    }

    public function show(Pharmacy $pharmacy,Assessment $assessment){
        return view('pharmacy.assessment.view', compact('pharmacy','assessment'));
    }

    
    public function create(Pharmacy $pharmacy,Patient $patient = null){
        $complaints = Complaint::all();
        return view('pharmacy.assessment.patient', compact('pharmacy','patient','complaints'));
    }

    public function store(Pharmacy $pharmacy,Request $request){
        //store patient if new patient, store assessment, proceed to vitals, 
        if($request->patient_id){
            $patient = Patient::find($request->patient_id);
        }else{
            $patient = Patient::create(['pharmacy_id'=> $pharmacy->id,'name'=> $request->name,'mobile'=> $request->mobile,'email'=> $request->email,'age_today'=> $request->age_today,'gender'=> $request->gender,'address'=> $request->address,'bloodgroup'=> $request->bloodtype,'genotype'=> $request->genotype]);
        }
        $assessment = Assessment::create(['pharmacy_id'=> $pharmacy->id,'patient_id'=> $patient->id,'user_id'=> auth()->id(),'slug'=> uniqid(),'complaints'=> $request->complaints]);
        return redirect()->route('pharmacy.assessments.vitals',[$pharmacy,$assessment]);  
    }


    public function vitals(Pharmacy $pharmacy,Assessment $assessment){
        $vitals = Vital::all();
        return view('pharmacy.assessment.vitals', compact('pharmacy','assessment','vitals'));
    }

    public function vitals_store(Pharmacy $pharmacy,Request $request){
        //dd($request->all());
        if(!count(array_filter($request->vitals ))){
            PatientVitals::where('patient_id',$request->patient_id)->delete();
        }else{
            foreach(array_filter($request->vitals ) as $key => $vital){
                $vitals = PatientVitals::updateOrCreate(['vital_id'=> $vital,'assessment_id'=> $request->assessment_id],['value_a'=> $request->answers_a[$key],'value_b'=> $request->answers_b[$key],'comment'=> $request->comments[$key] ,'patient_id'=> $request->patient_id]);
            }
            PatientVitals::where('patient_id',$request->patient_id)->whereNotIn('vital_id',array_filter($request->vitals))->delete();
        }
        
        return redirect()->back();
    }

    public function medical_medication(Pharmacy $pharmacy,Assessment $assessment){
        $drugs = Drug::all();
        $conditions = Condition::all();
        return view('pharmacy.assessment.medical_medication', compact('pharmacy','assessment','drugs','conditions'));
    }

    public function medical_medication_store(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        if(!count(array_filter($request->conditions ))){
            PatientMedicalHistory::where('patient_id',$request->patient_id)->delete();
            PatientMedicationHistory::where('patient_id',$request->patient_id)->delete();
        }else{
            PatientMedicalHistory::where('patient_id',$request->patient_id)->whereNotIn('condition_id',array_filter($request->conditions))->delete();
            PatientMedicationHistory::where('patient_id',$request->patient_id)->whereNotIn('condition_id',array_filter($request->conditions))->delete();
            foreach(array_filter($request->conditions ) as $key => $condition){
                $medical_history = PatientMedicalHistory::updateOrCreate(['condition_id'=> $condition,'assessment_id'=> $request->assessment_id,'patient_id'=> $request->patient_id],
                ['start'=> $request->condition_start[$key].'-01','end'=> $request->condition_end[$key].'-30']);

                foreach(array_filter($request->medications[$key] ) as $key2 => $medication){
                    $medications = PatientMedicationHistory::updateOrCreate(['drug_id'=> $medication,'assessment_id'=> $request->assessment_id,'condition_id'=> $condition,'patient_id'=> $request->patient_id],['start'=> $request->medication_start[$key][$key2].'-01','end'=> $request->medication_end[$key][$key2].'-30','effective'=> $request->medication_effectiveness[$key][$key2]]);
                }
            }
        }
        return redirect()->back();
    }

    public function family_history(Pharmacy $pharmacy,Assessment $assessment){
        
        $familySocialQuestions = FamilySocialQuestion::all();
        return view('pharmacy.assessment.family_history', compact('pharmacy','assessment','familySocialQuestions'));
    }

    public function family_history_store(Pharmacy $pharmacy,Request $request){
        if(!count(array_filter($request->questions ))){
            PatientFamilySocialHistory::where('patient_id',$request->patient_id)->delete();
        }else{
            PatientFamilySocialHistory::where('patient_id',$request->patient_id)->whereNotIn('question_id',array_filter($request->questions))->delete();
            foreach(array_filter($request->questions ) as $key => $question){
                $history = PatientFamilySocialHistory::updateOrCreate(['question_id'=> $question,'assessment_id'=> $request->assessment_id,'patient_id'=> $request->patient_id],
                ['value'=> $request->answers[$key],'comment'=> $request->comments[$key] ]);
            }
        }
        return redirect()->back();
    }

    

    public function system_review(Pharmacy $pharmacy,Assessment $assessment){
        $reviews = SystemReviewQuestion::all();
        return view('pharmacy.assessment.system_review', compact('pharmacy','reviews','assessment'));
    }

    public function system_review_store(Pharmacy $pharmacy,Request $request){
        if(!count(array_filter($request->reviews ))){
            PatientSystemReview::where('patient_id',$request->patient_id)->delete();
        }else{
            PatientSystemReview::where('patient_id',$request->patient_id)->whereNotIn('review_id',array_filter($request->reviews))->delete();
            foreach(array_filter($request->reviews ) as $key => $review){
                $history = PatientSystemReview::updateOrCreate(['assessment_id'=> $request->assessment_id,'patient_id'=> $request->patient_id,'review_id'=> $review],['comment'=> $request->comments[$key] ]);
            }
        }
        return redirect()->back();
    }

    public function provisional_diagnosis(Pharmacy $pharmacy,Assessment $assessment){
        $conditions = Condition::all();
        $labtests = LaboratoryTest::all();
        return view('pharmacy.assessment.provisional_diagnosis', compact('pharmacy','assessment','conditions','labtests'));
    }

    public function provisional_diagnosis_store(Pharmacy $pharmacy,Request $request){
        if(!count(array_filter($request->conditions ))){
            PatientProvisionalDiagnosis::where('patient_id',$request->patient_id)->delete();
        }else{
            PatientProvisionalDiagnosis::where('patient_id',$request->patient_id)->whereNotIn('condition_id',array_filter($request->conditions))->delete();
            foreach(array_filter($request->conditions ) as $key => $condition){
                $history = PatientProvisionalDiagnosis::updateOrCreate(['assessment_id'=> $request->assessment_id,'patient_id'=> $request->patient_id,'condition_id'=> $condition],
                ['laboratory_tests'=> $request->laboratory_tests[$key] ]);
            }
        }
        return redirect()->back();
    }

    public function laboratory_test(Pharmacy $pharmacy,Assessment $assessment){
        $labtests = LaboratoryTest::all();
        // dd($assessment->provisionalDiagnosis->pluck('laboratory_tests')->collapse()->unique());
        return view('pharmacy.assessment.laboratory', compact('pharmacy','assessment','labtests'));
    }

    public function laboratory_test_store(Pharmacy $pharmacy,Request $request){
        if(!count(array_filter($request->tests ))){
            PatientLaboratoryResult::where('patient_id',$request->patient_id)->delete();
        }else{
            PatientLaboratoryResult::where('patient_id',$request->patient_id)->whereNotIn('test_id',array_filter($request->tests))->delete();
            foreach(array_filter($request->tests ) as $key => $test){
                $history = PatientLaboratoryResult::updateOrCreate(['assessment_id'=> $request->assessment_id,'patient_id'=> $request->patient_id,'test_id'=> $test],['result'=> $request->results[$key],'comment' => $request->comments[$key] ] );
            }
        }
        return redirect()->back();
    }

    public function final_diagnosis(Pharmacy $pharmacy,Assessment $assessment){
        $conditions = Condition::all();
        $labtests = LaboratoryTest::all();
        return view('pharmacy.assessment.final_diagnosis', compact('pharmacy','assessment','conditions','labtests'));
    }

    public function final_diagnosis_store(Pharmacy $pharmacy,Request $request){
        if(!count(array_filter($request->conditions ))){
            PatientFinalDiagnosis::where('patient_id',$request->patient_id)->delete();
        }else{
            PatientFinalDiagnosis::where('patient_id',$request->patient_id)->whereNotIn('condition_id',array_filter($request->conditions))->delete();
            foreach(array_filter($request->conditions) as $key => $condition){
                $diagnosis = PatientFinalDiagnosis::updateOrCreate(['assessment_id'=> $request->assessment_id,
                'patient_id'=> $request->patient_id,'condition_id'=> $condition],
                ['expected_outcome'=> $request->expected_outcome[$key],'achieved' => array_key_exists($key,$request->achieved) ? $request->achieved[$key] : null ]);
            }
        }

        if($request->prescription){
            return redirect()->route('pharmacy.prescriptions.create',['pharmacy'=> $pharmacy,'assessment_id'=> $request->assessment_id,'patient_id'=> $request->patient_id]);
        }else return redirect()->route('pharmacy.assessments.index');
        return redirect()->back();
    }

    
}
