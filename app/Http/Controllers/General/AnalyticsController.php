<?php

namespace App\Http\Controllers\General;

use Carbon\Carbon;
use App\Models\Vital;
use App\Models\Sale;
use App\Models\Batch;
use App\Models\Pharmacy;
use App\Models\Condition;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\PrescriptionDetail;
use App\Http\Controllers\Controller;
use App\Models\PatientFinalDiagnosis;
use App\Models\PatientVitals;
use App\Models\Prescription;

class AnalyticsController extends Controller
{

    public function patient_individual(Request $request,Pharmacy $pharmacy){
        $diagnosis = PatientFinalDiagnosis::find($request->diagnosis_id);
        $vital = Vital::find($request->vital_id);
        $vitals = PatientVitals::where('assessment_id',$diagnosis->assessment_id)->where('vital_id',$vital->id)->orderBy('created_at','asc')->get();
        $prescriptions = Prescription::where('assessment_id',$diagnosis->assessment_id)->orderBy('created_at','asc')->get();
        $results = [];
        if($vitals->isNotEmpty()){
            $results[] = [
                                'prescription'=> '', 
                                'prescription_date'=> '', 
                                'review_date'=> $vitals->first()->created_at->format('Y-m-d h:i A'), 
                                'value_a' => $vitals->first()->value_a, 
                                'value_b' => $vitals->first()->value_b
                    ];
            foreach($prescriptions as $prescription){
                $results[] = [ 
                                'prescription'=> $prescription->details->implode('name', ', '), 
                                'prescription_date'=> $prescription->created_at->format('Y-m-d h:i A'), 
                                'review_date'=> $vitals->where('created_at','>',$prescription->created_at)->first() ? $vitals->where('created_at','>',$prescription->created_at)->first()->created_at->format('Y-m-d h:i A') : '', 
                                'value_a' => $vitals->where('created_at','>',$prescription->created_at)->first() ? $vitals->where('created_at','>',$prescription->created_at)->first()->value_a : '', 
                                'value_b' => $vitals->where('created_at','>',$prescription->created_at)->first() ? $vitals->where('created_at','>',$prescription->created_at)->first()->value_b : ''
                            ];
            }
        }

        return response()->json($results,200);
    }

    public function medications_monitor(Pharmacy $pharmacy){
        $diagnoses = Condition::whereHas('diagnoses.assessment',function($query) use($pharmacy){
            $query->where('pharmacy_id',$pharmacy->id);
        })->get();
        $inventories = Inventory::where('pharmacy_id',$pharmacy->id)->where('drug_id','!=',null)->get();
        $condition_id = $from = $to = $inventory_ids = $results = null;
        if(request()->query()){
            $condition_id = request()->condition_id;
            $inventory_ids = request()->medications;
            $from = Carbon::createFromFormat('d/m/Y',request()->from);
            $to = Carbon::createFromFormat('d/m/Y',request()->to);
            $medications = Inventory::whereIn('id',$inventory_ids)
                            ->whereHas('saleDetails',function($query)use($from,$to,$condition_id){ 
                                $query->whereBetween('created_at',[$from,$to])
                                      ->whereHas('sale.prescription.assessment.finalDiagnoses',function($data) use($condition_id){ 
                                    $data->where('condition_id',$condition_id);
                                });})
                // ->whereHas('prescriptions.prescription.assessment.finalDiagnoses',function($query) use($condition_id){
                //     $query->where('condition_id',$condition_id);})
                ->get();
            
            $results = [];
            foreach($medications as $medication){
                $diagnosis_count = $medication->saleDetails->pluck('sale.prescription.assessment.finalDiagnoses')->flatten()->where('condition_id',$condition_id)->count();
                $cures = $medication->saleDetails->whereBetween('created_at',[$from,$to])->pluck('sale.prescription.assessment.finalDiagnoses')->flatten()->where('condition_id',$condition_id)->where('achieved','yes')->count();
                $results[] = [ 'name'=> $medication->name, 'achieved' => $cures && $diagnosis_count ? $diagnosis_count/$cures * 100 : 0];
            }
            
        }
        return view('user.analytics.medications_monitor',compact('pharmacy','diagnoses','inventories','condition_id','inventory_ids','from','to','results'));
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
        $type = $category = $from = $to = $results = null;
        if(request()->query()){
            $from = Carbon::createFromFormat('d/m/Y',request()->from);
            $to = Carbon::createFromFormat('d/m/Y',request()->to);
            $type = request()->type;
            $category = request()->category;
            $results = [];
            $sales = Sale::whereBetween('created_at',[$from,$to])->get();
            if($category == 'drugs'){
                $sales = $sales->where('type','drug');
            }
            if($category == 'nondrugs'){
                $sales = $sales->where('type','nondrug');
            }
            switch($type){
                case 'Annually': 
                        $years = $sales->sortBy('created_at')->pluck('year');
                        foreach($years as $year){
                            $total = $sales->where('year',$year)->sum('total');
                            $results[] = ['name'=> 'Year '.$year, 'sales'=> $total];
                        }
                    break;
                case 'Quarterly':
                        $quaters = $sales->sortBy('created_at')->pluck('quarter')->unique();
                        foreach($quaters as $quarter){
                            $total = $sales->where('quarter',$quarter)->sum('total');
                            $results[] = ['name'=> 'Quarter '.$quarter, 'sales'=> $total];
                        }
                    break;
                case 'Monthly':
                        $months = $sales->sortBy('created_at')->pluck('month')->unique();
                        foreach($months as $month){
                            $total = $sales->where('month',$month)->sum('total');
                            $results[] = ['name'=> $month, 'sales'=> $total];
                        }
                    break;
                case 'Weekly':
                        $weeks = $sales->sortBy('created_at')->pluck('week')->unique();
                        foreach($weeks as $week){
                            $total = $sales->where('week',$week)->sum('total');
                            $results[] = ['name'=> 'Week '.$week, 'sales'=> $total];
                        }
                    break;
                case 'Daily':
                        $days = $sales->sortBy('created_at')->pluck('day')->unique();
                        foreach($days as $day){
                            $total = $sales->where('day',$day)->sum('total');
                            $results[] = ['name'=> $day, 'sales'=> $total];
                        }
                    break;
            }
        }
        return view('user.analytics.periodic_sales',compact('pharmacy','type','category','from','to','results'));
    }

    public function sales_volume_monitor(Pharmacy $pharmacy){
        $category = $from = $to = $results = null;
        if(request()->query()){
            $from = Carbon::createFromFormat('d/m/Y',request()->from);
            $to = Carbon::createFromFormat('d/m/Y',request()->to);
            $category = request()->category;
            $results = [];
            $inventories = Inventory::where('pharmacy_id',$pharmacy->id)->whereHas('saleDetails',function($query) use($from,$to){
                $query->whereBetween('created_at',[$from,$to]);
            })->get();
            if($category == 'drugs'){
                $inventories = $inventories->where('drug_id','!=',null);
            }
            if($category == 'nondrugs'){
                $inventories = $inventories->where('drug_id',null);
            }
            $top10 = $inventories->sortByDesc('sales_quantity')->take(10);
            foreach($top10 as $inv){
                $name = $inv->name;
                $quantity = $inv->sales_quantity;
                $results[] = ['name'=> $name, 'quantity'=> $quantity];
            }
        }
        return view('user.analytics.sales_volume',compact('pharmacy','category','from','to','results'));
    }

    public function earnings_per_product(Pharmacy $pharmacy){
        $category = $from = $to = $results = null;
        if(request()->query()){
            $from = Carbon::createFromFormat('d/m/Y',request()->from);
            $to = Carbon::createFromFormat('d/m/Y',request()->to);
            $category = request()->category;
            $results = [];
            $inventories = Inventory::where('pharmacy_id',$pharmacy->id)->whereHas('saleDetails',function($query) use($from,$to){
                $query->whereBetween('created_at',[$from,$to]);
            })->get();
            if($category == 'drugs'){
                $inventories = $inventories->where('drug_id','!=',null);
            }
            if($category == 'nondrugs'){
                $inventories = $inventories->where('drug_id',null);
            }
            $top10 = $inventories->sortByDesc('sales_amount')->take(10);
            foreach($top10 as $inv){
                $name = $inv->name;
                $amount = $inv->sales_amount;
                $results[] = ['name'=> $name, 'amount'=> $amount];
            }
        }
        return view('user.analytics.product_earnings',compact('pharmacy','category','from','to','results'));
    }

    public function business_capitalization(Pharmacy $pharmacy){
        $type = $category = $from = $to = $results = null;
        if(request()->query()){
            $from = Carbon::createFromFormat('d/m/Y',request()->from);
            $to = Carbon::createFromFormat('d/m/Y',request()->to);
            $type = request()->type;
            $category = request()->category;
            $results = [];
            $inventories = Inventory::where('pharmacy_id',$pharmacy->id)->whereHas('saleDetails',function($query) use($from,$to){
                $query->whereBetween('created_at',[$from,$to]);
            })->get();
            if($category == 'drugs'){
                $sales = $sales->where('type','drug');
            }
            if($category == 'nondrugs'){
                $sales = $sales->where('type','nondrug');
            }
            switch($type){
                case 'Annually': 
                        $years = $sales->sortBy('created_at')->pluck('year');
                        foreach($years as $year){
                            $total = $sales->where('year',$year)->sum('total');
                            $results[] = ['name'=> 'Year '.$year, 'sales'=> $total];
                        }
                    break;
                case 'Quarterly':
                        $quaters = $sales->sortBy('created_at')->pluck('quarter')->unique();
                        foreach($quaters as $quarter){
                            $total = $sales->where('quarter',$quarter)->sum('total');
                            $results[] = ['name'=> 'Quarter '.$quarter, 'sales'=> $total];
                        }
                    break;
                case 'Monthly':
                        $months = $sales->sortBy('created_at')->pluck('month')->unique();
                        foreach($months as $month){
                            $total = $sales->where('month',$month)->sum('total');
                            $results[] = ['name'=> $month, 'sales'=> $total];
                        }
                    break;
                case 'Weekly':
                        $weeks = $sales->sortBy('created_at')->pluck('week')->unique();
                        foreach($weeks as $week){
                            $total = $sales->where('week',$week)->sum('total');
                            $results[] = ['name'=> 'Week '.$week, 'sales'=> $total];
                        }
                    break;
                case 'Daily':
                        $days = $sales->sortBy('created_at')->pluck('day')->unique();
                        foreach($days as $day){
                            $total = $sales->where('day',$day)->sum('total');
                            $results[] = ['name'=> $day, 'sales'=> $total];
                        }
                    break;
            }
        }
        return view('user.analytics.business_capitalization',compact('pharmacy','type','category','from','to','results'));
    }

    public function expiring_products(Pharmacy $pharmacy){
        $batches = Batch::where('quantity','>',0)->where('expire_at','<',today()->addMonths(6))->whereHas('inventory',function($query) use($pharmacy){
            $query->where('pharmacy_id',$pharmacy->id);
        })->get();
        return view('user.analytics.expiring_products',compact('pharmacy','batches'));
    }

    public function expired_products(Pharmacy $pharmacy){
        $type = $category = $from = $to = $results = null;
        if(request()->query()){
            $from = Carbon::createFromFormat('d/m/Y',request()->from);
            $to = Carbon::createFromFormat('d/m/Y',request()->to);
            $type = request()->type;
            $category = request()->category;
            $results = [];
            $items = Inventory::where('pharmacy_id',$pharmacy->id)->whereHas('batches',function($query) use($from,$to){ 
                $query->whereBetween('expire_at',[$from,$to]);});
            if($category == 'drugs'){
                $items = $items->where('drug_id','!=',null);
            }
            if($category == 'nondrugs'){
                $items = $items->whereNull('drug_id');
            }
            $items = $items->get();
            
            switch($type){
                case 'Annually': 
                        $batches = $items->pluck('batches')->flatten();
                        $years = $batches->sortBy('expire_at')->pluck('year')->unique();
                        foreach($years as $year){
                            $total = $batches->where('year',$year)->sum('worth');
                            $results[] = ['name'=> 'Year '.$year, 'worth'=> $total];
                        }
                    break;
                case 'Quarterly':
                        $batches = $items->pluck('batches')->flatten();
                        $periods = $batches->sortBy('expire_at')->pluck('year','quarter');
                        foreach($periods as $quarter => $year){
                            $total = $batches->where('quarter',$quarter)->where('year',$year)->sum('worth');
                            $results[] = ['name'=> "Quarter $quarter - $year", 'worth'=> $total];
                        }
                    break;
                case 'Monthly':
                        $batches = $items->pluck('batches')->flatten();
                        $periods = $batches->sortBy('expire_at')->pluck('year','month');
                        foreach($periods as $month => $year){
                            $total = $batches->where('month',$month)->where('year',$year)->sum('worth');
                            $results[] = ['name'=> "$month $year", 'worth'=> $total];
                        }
                    break;
                case 'Weekly':
                        $batches = $items->pluck('batches')->flatten();
                        $periods = $batches->sortBy('expire_at')->pluck('year','week')->unique();
                        foreach($periods as $week => $year){
                            $total = $batches->where('week',$week)->where('year',$year)->sum('worth');
                            $results[] = ['name'=> "Week $week - $year", 'worth'=> $total];
                        }
                    break;
                case 'Daily':
                        $batches = $items->pluck('batches')->flatten();
                        $days = $batches->sortBy('expire_at')->pluck('day')->unique();
                        foreach($days as $day){
                            $total = $batches->where('day',$day)->sum('worth');
                            $results[] = ['name'=> $day, 'worth'=> $total];
                        }
                    break;
            }
        }
        return view('user.analytics.expired_products',compact('pharmacy','type','category','from','to','results'));
    }

}
