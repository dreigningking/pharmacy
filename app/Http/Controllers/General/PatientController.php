<?php

namespace App\Http\Controllers\General;

use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    
    public function index(Pharmacy $pharmacy)
    {
        $patients = Patient::where('pharmacy_id',$pharmacy->id)->get();
        return view('pharmacy.patient.list', compact('pharmacy', 'patients'));
    }

    public function view(Pharmacy $pharmacy,Patient $patient=null){
        // dd($patient);
        return view('pharmacy.patient.view', compact('pharmacy','patient'));
    }
    
    public function create(Pharmacy $pharmacy){
        $conditions = Condition::all();
        $medicines = Medicine::all();
        return view('pharmacy.patient.add', compact('pharmacy','conditions','medicines'));
    }

    
    public function store(Pharmacy $pharmacy, Request $request){
        // dd($request->all());
        $patient = Patient::create(['pharmacy_id'=> $pharmacy->id,'name'=> $request->patient_name,'mobile'=> $request->patient_mobile,'email'=> $request->patient_email,'age_today'=> $request->patient_age_today,'gender'=> $request->patient_gender,'address'=> $request->patient_address,'bloodgroup'=> $request->patient_bloodgroup,'genotype'=> $request->patient_genotype]);
        
        if($request->action == "save")
            return redirect()->route("pharmacy.patient.list",$pharmacy);
        else
            return redirect()->route("pharmacy.assessment.create",[$pharmacy,$patient]);
    }

    
    public function update(Pharmacy $pharmacy,Request $request){
        return redirect()->route('pharmacy.patients.index',$pharmacy);
    }

    public function destroy(Pharmacy $pharmacy,Request $request)
    {
        return redirect()->route('pharmacy.patients.index',$pharmacy);
    }
}