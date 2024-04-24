<?php

namespace App\Http\Controllers\General;

use Carbon\Carbon;
use App\Models\Drug;
use App\Models\Pharmacy;
use App\Models\Condition;
use Illuminate\Http\Request;
use App\Models\PrescriptionDetail;
use App\Http\Controllers\Controller;

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
        $medications = Drug::whereIn('id',request()->medications)
            ->whereHas('prescriptions.prescription.assessment.finalDiagnosis',function($query) use($condition_id){
                $query->where('condition_id',$condition_id);
            })->get();
        
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
                $results[] = [ 'name'=> $medication->name, 'achieved' => $diagnosis_count/$cures * 100];
            }
        }
        return view('user.analytics.medications_monitor',compact('pharmacy','diagnoses','drugs','condition_id','drug_ids','from','to','results'));
    }
    
    public function diagnosis_monitor(Pharmacy $pharmacy){
        return view('user.analytics.diagnosis_monitor',compact('pharmacy'));
    }

    public function sales_modality(Pharmacy $pharmacy){
        return view('user.analytics.sales_modality',compact('pharmacy'));
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
