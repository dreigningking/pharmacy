<?php

namespace App\Http\Controllers\General;

use Carbon\Carbon;
use App\Models\Vital;
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
        //dd(request()->query());
        $name = request()->name ?? null;
        $search = request()->search ?? null;
        $created_at = request()->created_at ?? null;
        $gender = request()->gender ?? 'both';
        $treatment = request()->treatment ?? null;
        $patients = Patient::where('pharmacy_id',$pharmacy->id);
        if($name)
        $patients = $patients->where('name','LIKE',"%$name%");
        if($search)
        $patients = $patients->where('name','LIKE',"%$name%");
        if($gender != 'both')
        $patients = $patients->where('gender',$gender);
        if($created_at){
            $created = Carbon::createFromFormat('d/m/Y',$created_at);
            $patients = $patients->whereDate('created_at',$created->format('Y-m-d'));
        }
        
        if($treatment)
        $patients = $patients->whereHas('prescriptions',function($query){
                        $query->whereHas('sales',function($qury){
                            $qury->whereBetween('created_at',[today()->subMonth(),today()]);
                        });
                    });

        $patients = $patients->paginate(20);
        return view('pharmacy.patient.list', compact('pharmacy', 'patients','name','search','created_at','gender','treatment'));
    }

    public function view(Pharmacy $pharmacy,Patient $patient=null){
        $vitals = Vital::all();
        return view('pharmacy.patient.view', compact('pharmacy','patient','vitals'));
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

    public function family_history(Pharmacy $pharmacy,Request $request){
        //
    }
    
    public function medical_medication(Pharmacy $pharmacy,Request $request){
        //
    }
    
}