<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Patient;
use App\Models\Pharmacy;
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
        dd($patient);
        return view('pharmacy.patient.view', compact('pharmacy','patient'));
    }

    public function search(Pharmacy $pharmacy){
        $patients = Patient::where('pharmacy_id',$pharmacy->id)->get();
        return view('pharmacy.patient.search', compact('pharmacy','patients'));
    }
    
    public function create(Pharmacy $pharmacy){
        return view('pharmacy.patient.add', compact('pharmacy'));
    }

    
    public function store(Pharmacy $pharmacy, Request $request){
        // dd($request->all());
        $patient = Patient::updateOrCreate(['email' => $request->email,'pharmacy_id'=> $pharmacy->id],['name' => $request->first_name." ".$request->last_name,
        'mobile'=> $request->mobile,'dob'=> $request->dob, 'address'=> $request->address,
        'gender' => $request->gender,'emr'=> $pharmacy->id.$request->first_name.now()->format("Y")]);
        if($request->action == "save")
            return redirect()->route("pharmacy.patient.list",$pharmacy);
        else
            return redirect()->route("pharmacy.assessment.create",[$pharmacy,$patient]);
    }
    
    public function edit(Pharmacy $pharmacy,Patient $patient){
        return view('pharmacy.patient.edit',compact('pharmacy','patient'));
    }

    
    public function update(Request $request, $id){
        return redirect()->route('pharmacy.patient.list',$pharmacy);
    }

    public function destroy(Request $request)
    {
        return redirect()->route('pharmacy.patient.list',$pharmacy);
    }
}