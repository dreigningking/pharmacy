<?php

namespace App\Http\Controllers\General;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalyticsController extends Controller
{

    public function patient_individual(){
        return response()->json();
    }

    public function medications_monitor(Pharmacy $pharmacy){
        return view('user.analytics.medications_monitor',compact('pharmacy'));
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
