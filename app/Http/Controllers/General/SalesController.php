<?php

namespace App\Http\Controllers\General;

use App\Models\Sale;
use App\Models\Pharmacy;
use App\Models\SaleDetail;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    
    public function index(Pharmacy $pharmacy){
        $search = request()->search ?? null;
        $from = request()->from ?? null;
        $to = request()->to ?? null;
        $user = request()->user ?? null;
        $sales = Sale::where('pharmacy_id',$pharmacy->id);
        if($search){
            $sales =  $sales->whereHas('details',function($query) use($search){
                $query->where('batch','LIKE',"%$search%")->orWhereHas('inventory',function($q) use($search){
                    $q->where('name','LIKE',"%$search%");
                });
            });
        }
        if($from){
            $sales = $sales->where('created_at','>=',$to);
        }
        if($to){
            $sales = $sales->where('created_at','<=',$to);
        }
        if($user){
            $sales = $sales->where('user_id',$user);
        }
        $sales = $sales->paginate(30);
        return view('pharmacy.sales.list',compact('pharmacy','sales','search','from','to','user'));
    }

    public function create(Pharmacy $pharmacy,Prescription $prescription = null)
    {
        $inventories = $pharmacy->inventories;
        $patients = $pharmacy->patients;
        return view('pharmacy.sales.create',compact('pharmacy','inventories','prescription','patients'));
    }

    public function store(Pharmacy $pharmacy,Request $request){
        $sale = Sale::create(['pharmacy_id'=> $pharmacy->id,'prescription_id'=> $request->prescription_id,
        'patient_id'=> $request->patient_id,'user_id'=> auth()->id(),'status'=> $request->status? true:false]);
        foreach($request->inventories as $key => $inventory){
            SaleDetail::create(['sale_id'=> $sale->id,'inventory_id'=> $inventory,'batch'=> $request->batches[$key],'quantity'=> $request->quantities[$key],'price'=> $request->prices[$key],'amount'=> $request->amounts[$key]]);
        }
        return redirect()->route('pharmacy.sales.index',$pharmacy);
    }

    public function show(Pharmacy $pharmacy){
        return view('pharmacy.sales.view',compact('pharmacy'));
    }

    public function edit(Pharmacy $pharmacy,Sale $sale){
        $inventories = $pharmacy->inventories;
        $patients = $pharmacy->patients;
        return view('pharmacy.sales.edit',compact('pharmacy','inventories','sale','patients'));
    }

    public function update(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        $sale = Sale::find($request->sale_id);
        $details = array_filter($request->detail_id);
        foreach(array_filter($request->inventories ) as $key => $inventory_id){
            if($request->detail_id[$key]){  
                SaleDetail::where('id',$request->detail_id[$key])->update([
                    'inventory_id'=> $inventory_id,'batch'=> $request->batches[$key],'quantity'=> $request->quantities[$key],'price'=> $request->prices[$key],'amount'=> $request->amounts[$key]
                ]);
                
            }else{
                $nDetail = SaleDetail::create(['sale_id'=> $sale->id,'inventory_id'=> $inventory_id,'batch'=> $request->batches[$key],'quantity'=> $request->quantities[$key],'price'=> $request->prices[$key],'amount'=> $request->amounts[$key]]);
                array_push($details,$nDetail->id);
            }
        }
        SaleDetail::where('sale_id',$sale->id)->whereNotIn('id',$details)->delete();
        $sale->status = $request->status;
        $sale->save();
        return redirect()->route('pharmacy.sales.index',$pharmacy);
    }

    
    public function destroy($id)
    {
        //
    }
}
