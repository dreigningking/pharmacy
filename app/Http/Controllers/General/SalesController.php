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
        $sales = Sale::where('pharmacy_id',$pharmacy->id)->paginate(50);
        return view('pharmacy.sales.list',compact('pharmacy','sales'));
    }

    public function create(Pharmacy $pharmacy,Prescription $prescription = null)
    {
        $inventories = $pharmacy->inventories;
        $patients = $pharmacy->patients;
        return view('pharmacy.sales.create',compact('pharmacy','inventories','prescription','patients'));
    }

    public function store(Pharmacy $pharmacy,Request $request)
    {
        $sale = Sale::create(['pharmacy_id'=> $pharmacy->id,'prescription_id'=> $request->prescription_id,
        'patient_id'=> $request->patient_id,'user_id'=> auth()->id(),'status'=> $request->status? true:false]);
        foreach($request->inventories as $key => $inventory){
            SaleDetail::create(['sale_id'=> $sale->id,'inventory_id'=> $inventory,'batch'=> $request->batches[$key],'quantity'=> $request->quantities[$key],'price'=> $request->prices[$key],'amount'=> $request->amounts[$key]]);
        }
        return redirect()->route('pharmacy.sales.index',$pharmacy);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        return view('pharmacy.sales.view',compact('pharmacy'));
    }

    public function edit(Pharmacy $pharmacy,Sale $sale)
    {
        $inventories = $pharmacy->inventories;
        $patients = $pharmacy->patients;
        return view('pharmacy.sales.edit',compact('pharmacy','inventories','sale','patients'));
    }

    public function update(Pharmacy $pharmacy,Request $request)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
