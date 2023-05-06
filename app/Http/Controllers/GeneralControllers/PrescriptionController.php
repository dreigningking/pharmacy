<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrescriptionController extends Controller
{
    
    
    public function plan(Pharmacy $pharmacy) {
        return view ('pharmacy.patient.non-medical-plan', compact('pharmacy'));
    }

    public function index(Pharmacy $pharmacy)
    {
        return view('pharmacy.prescription.list', compact('pharmacy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pharmacy $pharmacy,Assessment $assessment = null,Patient $patient = null)
    {
        $inventories = $pharmacy->inventories->where('drug_id','!=',null);
        $patients = $pharmacy->patients;
        $patient = $patient ? $patient : ($assessment ? $assessment->patient : null);
        $assessments = $patient ? $pharmacy->patient->assessments : $pharmacy->assessments;
        return view('pharmacy.prescription.create', compact('pharmacy','patient','patients','inventories','assessment','assessments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
