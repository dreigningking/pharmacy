<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Supplier;
use App\Models\Item;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Imports\InventoriesImport;
use Maatwebsite\Excel\Facades\Excel;
class InventoryController extends Controller
{

    public function start(Pharmacy $pharmacy){
        $drugs = Item::all();
        return view('pharmacy.inventory.start',compact('pharmacy','drugs'));
    }

    public function setup(Pharmacy $pharmacy,Request $request){
        Excel::import(new InventoriesImport, $request->file('your_file'));
        return redirect()->back()->with('success', 'All good!');
    }
   
    public function drugs(){
        if($search = request()->search)
        $drugs = Item::where('name','LIKE',"%$search%")->get();
        else
        $drugs = Item::all();
        if( request()->type == 'ajax')
            return response()->json(['drugs'=> $drugs],200);
        else 
            return view('drugs',compact('drugs'));    
    }

    
    
    public function inventory(Pharmacy $pharmacy){
        return view('pharmacy.inventory.list',compact('pharmacy'));
    }
    
    public function shelf(Pharmacy $pharmacy){
        return view('pharmacy.inventory.shelf',compact('pharmacy'));
    }
    
    public function purchase(Pharmacy $pharmacy){
        $user = Auth::user();
        // $suppliers = Supplier::where('pharmacy_id',$pharmacy->id)->get();
        $suppliers = $pharmacy->suppliers;
        $items = Item::all();
        $medicines = Medicine::all();
        $countries = Country::all();
        return view('pharmacy.inventory.supply',compact('user','pharmacy','suppliers','items','medicines','countries'));
    }


}