<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Drug;
use App\Models\Country;
use App\Models\Pharmacy;
use App\Models\Supplier;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Imports\InventoriesImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{

    public function list(Pharmacy $pharmacy){
        if($search = request()->search)
        $items =  Inventory::where('pharmacy_id',$pharmacy->id)->where('name','LIKE',"%$search%")->get();
        else
        $items = Inventory::where('pharmacy_id',$pharmacy->id)->get();
        // dd($items);
        if(request()->type == 'ajax')
            return response()->json(['items'=> $items],200);
        else 
            return view('pharmacy.inventory.list',compact('pharmacy','items'));
    }

    public function drugs(){  
        if($search = request()->search)
        $drugs = Drug::where('name','LIKE',"%$search%")->get();
        else
        $drugs = Drug::all();
        if( request()->type == 'ajax')
            return response()->json(['drugs'=> $drugs],200);
        else 
            return view('drugs',compact('drugs'));    
    }

    public function start(Pharmacy $pharmacy){
        $drugs = Drug::all();
        return view('pharmacy.inventory.start',compact('pharmacy','drugs'));
    }

    public function download(Pharmacy $pharmacy,Request $request){
        Excel::import(new InventoriesExport, $request->file('your_file'));
        return redirect()->back()->with('success', 'All good!');
    }

    public function import(Pharmacy $pharmacy,Request $request){
        Excel::import(new InventoriesImport, $request->file('your_file'));
        return redirect()->back()->with('success', 'All good!');
    }
   
    public function shelf(Pharmacy $pharmacy){
        return view('pharmacy.inventory.shelf',compact('pharmacy'));
    }
    
    


}