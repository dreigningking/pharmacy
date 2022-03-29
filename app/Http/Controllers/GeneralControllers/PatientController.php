<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pharmacy $pharmacy)
    {
        $patients = Patient::all();
        return view('pharmacy.patient.list', compact('pharmacy', 'patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read(Pharmacy $pharmacy)
    {
        return view('pharmacy.patient.view', compact('pharmacy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Pharmacy $pharmacy)
    {
        return view('pharmacy.patient.add', compact('pharmacy'));
    }

    public function store(Pharmacy $pharmacy, Request $request)
    {
        
        $patient = new Patient;
        $patient->name = $request->first_name." ".$request->last_name;
        $patient->mobile = $request->mobile;
        $patient->email = $request->email;
        $patient->dob = $request->dob;
$patient->gender = $request->gender;
$patient->emr = $pharmacy->id.$request->first_name.now()->format("Y");
$patient->save();
return redirect() ->route("pharmacy.newassessment", $pharmacy);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assess(Pharmacy $pharmacy){
        return view('pharmacy.assessment.list', compact('pharmacy'));
    }

    public function showassessment(Pharmacy $pharmacy){
        return view('pharmacy.assessment.view', compact('pharmacy'));
    }

    public function new(Pharmacy $pharmacy) {
        return view('pharmacy.assessment.add', compact('pharmacy'));
    }

    public function prescription(Pharmacy $pharmacy) {
        return view('pharmacy.assessment.prescription', compact('pharmacy'));
    }

    public function plan(Pharmacy $pharmacy) {
        return view ('pharmacy.patient.non-medical-plan', compact('pharmacy'));
    }
}