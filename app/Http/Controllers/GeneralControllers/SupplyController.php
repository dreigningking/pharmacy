<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\User;
use App\Models\Batch;
use App\Models\Country;
use App\Models\Pharmacy;
use App\Models\Purchase;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use App\Http\Traits\InventoryTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplyController extends Controller
{
    use InventoryTrait;

    public function list(Pharmacy $pharmacy){
        $purchases = Purchase::where('pharmacy_id',$pharmacy->id)->get();
        return view('pharmacy.inventory.supplies.list',compact('pharmacy','purchases'));
    }

    public function create(Pharmacy $pharmacy){
        $user = Auth::user();
        $suppliers = $pharmacy->suppliers;
        $countries = Country::all();
        return view('pharmacy.inventory.supplies.new',compact('user','pharmacy','suppliers','countries'));
    }

    public function create_from_inventory(Pharmacy $pharmacy,Request $request){
        $user = User::find($request->user_id); //why do you need user?
        $suppliers = $pharmacy->suppliers;
        $countries = Country::all();
        $inventories = Inventory::whereIn('id',$request->inventories)->get();
        return view('pharmacy.inventory.supplies.new',compact('user','pharmacy','suppliers','countries','inventories'));
    }

    public function store(Pharmacy $pharmacy,Request $request){
        $purchase = Purchase::create(['pharmacy_id'=> $pharmacy->id,'supplier_id'=> $request->supplier_id,'invoice_number'=> \uniqid(),'total'=> collect(array_filter($request->amounts))->sum(),'info'=> $request->info]);
        foreach ($request->inventories as $key => $inventory) {
            $detail = PurchaseDetail::create(['purchase_id'=> $purchase->id,
            'inventory_id'=> $inventory,'package_type'=> $request->package_types[$key],'cost'=> $request->costs[$key],
            'quantity'=> $request->quantities[$key],'amount'=> $request->amounts[$key]
            ]);
        }
        if($request->email_supplier){
            //email-supplier
        }
        if($request->action == "execute"){
            //$this->restock($purchase);
        }
        return redirect()->route('pharmacy.inventory.purchases.list',$pharmacy);
    }

    public function edit(Pharmacy $pharmacy,Purchase $purchase){
        $suppliers = $pharmacy->suppliers;
        $countries = Country::all();
        $inventories = $purchase->details;
        return view('pharmacy.inventory.supplies.edit',compact('user','pharmacy','suppliers','countries','inventories'));
    }

    public function add_to_inventory(Pharmacy $pharmacy,Purchase $purchase){
        return view('pharmacy.inventory.supplies.inventory',compact('pharmacy','purchase'));
    }
    public function save_to_inventory(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        $purchase = Purchase::find($request->purchase_id);
        foreach($request->inventories as $key=>$detail){
            $inventory = Inventory::updateOrCreate(['id'=> $detail],['unit_cost'=> $request->cost[$key] / $request->units[$key],'unit_price'=> $request->price[$key],'profit'=> $request->price[$key] - ($request->cost[$key] / $request->units[$key])]);
            $batch = Batch::where('inventory_id',$inventory->id)->where('number',$request->batch[$key])->first();
            if($batch){
                $batch->quantity = $batch->quantity + $request->units[$key];
                $batch->save();
            }else Batch::create(['inventory_id'=>$inventory->id,'number'=> $request->batch[$key],'quantity'=> $request->units[$key],'expire_at'=> $request->expiry[$key]]);
        }
        $purchase->status = true;
        $purchase->save();
        return redirect()->route('pharmacy.inventory.list',$pharmacy);
    }

    public function delete(Pharmacy $pharmacy,Request $request){
        $purchase = Purchase::find($request->purchase_id);
        $purchase->delete();
        return redirect()->route('pharmacy.inventory.purchases.list',$pharmacy);
    }

}
