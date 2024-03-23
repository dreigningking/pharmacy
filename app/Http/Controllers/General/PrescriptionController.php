<?php

namespace App\Http\Controllers\General;

use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prescription;
use App\Models\PrescriptionDetail;

class PrescriptionController extends Controller
{
    
    
    public function plan(Pharmacy $pharmacy) {
        return view ('pharmacy.patient.non-medical-plan', compact('pharmacy'));
    }

    public function index(Pharmacy $pharmacy)
    {
        $prescriptions = Prescription::where('pharmacy_id',$pharmacy->id)->paginate(50);
        // dd($prescriptions->first()->summary);
        return view('pharmacy.prescription.list', compact('pharmacy','prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_new(Pharmacy $pharmacy)
    {
        $inventories = $pharmacy->inventories->where('drug_id','!=',null);
        $patients = $pharmacy->patients;
        $patient = null;
        $assessments = null;
        return view('pharmacy.prescription.create', compact('pharmacy','patient','patients','inventories','assessment','assessments'));
    }
    
    public function create_with_data(Pharmacy $pharmacy,Request $request)
    {
        $inventories = $pharmacy->inventories->where('drug_id','!=',null);
        $patients = $pharmacy->patients;
        $assessment = $request->assessment_id ? Assessment::find($request->assessment_id) : null;
        $patient = $request->patient_id ? Patient::find($request->patient_id) : ($assessment ? $assessment->patient : null);
        $assessments = $patient ? $patient->assessments : null;
        return view('pharmacy.prescription.create', compact('pharmacy','patient','patients','inventories','assessment','assessments'));
    }

    public function store(Pharmacy $pharmacy,Request $request)
    {
        // dd($request->all());
        $prescription = Prescription::create(['pharmacy_id'=> $pharmacy->id,'user_id'=> auth()->id(),
        'assessment_id'=> $request->assessment_id,'patient_id'=> $request->patient_id,'origin'=> $request->origin]);
        foreach($request->drugs as $key => $drug_id){
            PrescriptionDetail::create(['prescription_id'=> $prescription->id,'drug_id' => $drug_id,'quantity_per_dose'=> $request->quantity[$key],'frequency'=> $request->frequency[$key],'duration'=> $request->duration[$key]]);
        }
        if($request->dispense){
            return redirect()->route('pharmacy.sales.create',['pharmacy'=> $pharmacy,'prescription'=> $prescription]);
        }else return redirect()->route('pharmacy.sales.create',$pharmacy);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Pharmacy $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        $inventories = $pharmacy->inventories;
        return view('pharmacy.prescription.view', compact('pharmacy','inventories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Pharmacy $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Pharmacy $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Pharmacy $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        //
    }
}
