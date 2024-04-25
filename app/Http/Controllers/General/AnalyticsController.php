<?php

namespace App\Http\Controllers\General;

use Carbon\Carbon;
use App\Models\Drug;
use App\Models\Sale;
use App\Models\Pharmacy;
use App\Models\Condition;
use Illuminate\Http\Request;
use App\Models\PrescriptionDetail;
use App\Http\Controllers\Controller;
use App\Models\PatientFinalDiagnosis;

class AnalyticsController extends Controller
{

    public function patient_individual(){
        return response()->json();
    }

    public function medications_monitor(Pharmacy $pharmacy){
        $diagnoses = Condition::whereHas('diagnoses.assessment',function($query) use($pharmacy){
            $query->where('pharmacy_id',$pharmacy->id);
        })->get();
        $drugs = Drug::whereHas('inventories',function($query) use($pharmacy){
            $query->where('pharmacy_id',$pharmacy->id);
        })->get();
        $condition_id = $from = $to = $drug_ids = $results = null;
        
        if(request()->query()){
            $condition_id = request()->condition_id;
            $drug_ids = request()->medications;
            $from = Carbon::createFromFormat('d/m/Y',request()->from);
            $to = Carbon::createFromFormat('d/m/Y',request()->to);
            $medications = Drug::whereIn('id',$drug_ids)
                ->whereHas('prescriptions.prescription.assessment.finalDiagnosis',function($query) use($condition_id){
                    $query->where('condition_id',$condition_id);
                })->get();
            $results = [];
            foreach($medications as $medication){
                $diagnosis_count = $medication->prescriptions->whereBetween('created_at',[$from,$to])->pluck('prescription.assessment.finalDiagnosis')->flatten()->where('condition_id',$condition_id)->count();
                $cures = $medication->prescriptions->whereBetween('created_at',[$from,$to])->pluck('prescription.assessment.finalDiagnosis')->flatten()->where('condition_id',$condition_id)->where('achieved','yes')->count();
                $results[] = [ 'name'=> $medication->name, 'achieved' => $cures && $diagnosis_count ? $diagnosis_count/$cures * 100 : 0];
            }
            
        }
        return view('user.analytics.medications_monitor',compact('pharmacy','diagnoses','drugs','condition_id','drug_ids','from','to','results'));
    }
    
    public function diagnosis_monitor(Pharmacy $pharmacy){
        $diagnoses = Condition::whereHas('diagnoses.assessment',function($query) use($pharmacy){
            $query->where('pharmacy_id',$pharmacy->id);
        })->get();
        $conditions = $from = $to = $minimum_age = $maximum_age = $gender = $results = null;
        if(request()->query()){
            $conditions = request()->conditions;
            $minimum_age = request()->minimum_age;
            $maximum_age = request()->maximum_age;
            $gender = request()->gender;
            $from = request()->from ? Carbon::createFromFormat('d/m/Y',request()->from) : '';
            $to = request()->to ? Carbon::createFromFormat('d/m/Y',request()->to) : '';
            $diagnoses = PatientFinalDiagnosis::whereIn('condition_id',$conditions);
            if($from){ $diagnoses = $diagnoses->where('created_at','>=',$from); }
            if($to){ $diagnoses = $diagnoses->where('created_at','<=',$to); }
            if($gender){ $diagnoses = $diagnoses->whereHas('assessment.patient',function($query) use($gender){
                    $query->where('gender',$gender); });}
            if($minimum_age){ $diagnoses = $diagnoses->whereHas('assessment.patient',function($query) use($minimum_age){
                $query->where('age_today','>=',$minimum_age);}); }
            if($maximum_age){ $diagnoses = $diagnoses->whereHas('assessment.patient',function($query) use($maximum_age){
                $query->where('age_today','<=',$maximum_age);}); }
            $diagnoses = $diagnoses->get();
            $results = [];
            foreach($diagnoses->groupBy('condition_id') as $diagnosis){
                $results[] = [ 'name'=> $diagnosis->first()->condition->description, 'cases' => $diagnosis->count()];
            }
            
        }
        return view('user.analytics.diagnosis_monitor',compact('pharmacy','diagnoses','conditions','minimum_age','maximum_age','gender','from','to','results'));
    }

    public function sales_modality(Pharmacy $pharmacy){
        $from = $to = $results = null;
        if(request()->query()){
            $from = Carbon::createFromFormat('d/m/Y',request()->from);
            $to = Carbon::createFromFormat('d/m/Y',request()->to);
            $sales = Sale::whereBetween('created_at',[$from,$to])->get();
            $results = [];
            $results[] = ['name'=> 'Sales based on client request',
                            'number' => $sales->where('prescription_id',null)->where('type','drug')->count(),
                            'worth' => $sales->where('prescription_id',null)->where('type','drug')->sum('total')];
            
            $prescription = $sales->filter(function ($sale, $key) {
                return $sale->prescription->where('origin','Hospital');
            });
            $results[] = ['name'=> 'Sales by prescription',
                            'number' => $prescription->count(),
                            'worth' => $prescription->sum('total')];

            $pharmacy_recommend = $sales->filter(function ($sale, $key) {
                return $sale->prescription->where('origin','Pharmacist');
            });              
            $results[] = ['name'=> 'Sales by Pharm recommendation',
                            'number' => $pharmacy_recommend->count(),
                            'worth' => $pharmacy_recommend->sum('total')];

            $sales_rep = $sales->filter(function ($sale, $key) {
                return $sale->prescription->where('origin','Sales Rep');
            });   
            $results[] = ['name'=> 'Sales by other staffs',
                            'number' => $sales_rep->count(),
                            'worth' => $sales_rep->sum('total')];
        }
        return view('user.analytics.sales_modality',compact('pharmacy','from','to','results'));
    }

    public function periodic_sales_monitor(Pharmacy $pharmacy){
        return view('user.analytics.periodic_sales',compact('pharmacy'));
    }

    public function sales_volume_monitor(Pharmacy $pharmacy){
        return view('user.analytics.sales_volume',compact('pharmacy'));
    }

    public function earnings_per_product(Pharmacy $pharmacy){
        return view('user.analytics.product_earnings',compact('pharmacy'));
    }

    public function business_capitalization(Pharmacy $pharmacy){
        return view('user.analytics.business_capitalization',compact('pharmacy'));
    }

    public function expiring_products(Pharmacy $pharmacy){
        return view('user.analytics.expiring_products',compact('pharmacy'));
    }

    public function expired_products(Pharmacy $pharmacy){
        return view('user.analytics.expired_products',compact('pharmacy'));
    }

}
