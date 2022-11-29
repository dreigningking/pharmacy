<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Drug;
use App\Models\Batch;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Supplier;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Exports\InventoriesExport;
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

    public function batches(Pharmacy $pharmacy){
        if($search = request()->search){
            $items =  Batch::with(['inventory'=> function($query) use($pharmacy,$search){
                $query->where('pharmacy_id',$pharmacy->id)->where('name','LIKE',"%$search%");}])->get();
        }else{
        $items = Batch::with(['inventory'=> function($query) use($pharmacy){
            $query->where('pharmacy_id',$pharmacy->id); }])->get();
        }
        return response()->json(['items'=> $items],200);
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

    public function medicines(){  
        // if($search = request()->search)
        // $medicines = Medicine::where('name','LIKE',"%$search%")->get();
        // else
        // $medicines = Drug::all();
        // return response()->json(['medicine'=> $medicines],200);    
        
        
        // return response()->json($data,200);
          
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