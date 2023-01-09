<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $patients = Patient::where('pharmacy_id',$pharmacy->id)->get();
        return view('pharmacy.assessment.add', compact('pharmacy','pateint','patients'));
    }

    public function store(Pharmacy $pharmacy,Request $request){
        dd($request->all());
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
