<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Bank;
use App\Models\Drug;
use App\Models\User;
use App\Models\Batch;
use App\Models\Country;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Supplier;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Exports\InventoriesExport;
use App\Imports\InventoriesImport;
use App\Http\Controllers\Controller;
use App\Models\DrugCategory;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{

    public function list(Pharmacy $pharmacy){
        $items = Inventory::where('pharmacy_id',$pharmacy->id);
        if($name = request()->name)
        $items =  $items->where('name','LIKE',"%$name%");
        $items =  $items->get();
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

    public function store(Request $request,Pharmacy $pharmacy){
        return redirect()->back();
    }

    public function show(Pharmacy $pharmacy,Inventory $item){
        // if($search = request()->search){
        //     $items =  Batch::with(['inventory'=> function($query) use($pharmacy,$search){
        //         $query->where('pharmacy_id',$pharmacy->id)->where('name','LIKE',"%$search%");}])->get();
        // }else{
        // $items = Batch::with(['inventory'=> function($query) use($pharmacy){
        //     $query->where('pharmacy_id',$pharmacy->id); }])->get();
        // }
        // return response()->json(['items'=> $items],200);
        return view('pharmacy.inventory.view',compact('pharmacy','item'));
    }

    public function settings(Pharmacy $pharmacy){
        return view('pharmacy.inventory.settings',compact('pharmacy'));
    }

    // public function getDrugs(Pharmacy $pharmacy){

    // }

    public function drugs(Pharmacy $pharmacy){  
        // $drugs = Drug::whereDoesntHave('inventories',function($query) use($pharmacy){$query->where('pharmacy_id',$pharmacy->id);})->get();
        $categories = DrugCategory::all();
        $drugs = Drug::where('status',true);
        if($name = request()->name)
        $drugs = $drugs->where('name','LIKE',"%$name%");
        if($manufacturer = request()->manufacturer)
        $drugs = $drugs->where('manufacturer','LIKE',"%$name%");
        if($categoriz = request()->categories)
        $drugs = $drugs->whereIn('category_id',$categoriz);
        $drugs = $drugs->paginate(100);
        if( request()->type == 'ajax')
        return response()->json(['drugs'=> $drugs],200);
        return view('pharmacy.inventory.drugs',compact('drugs','categories','pharmacy'));    
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
   

    public function suppliers(){
        $user = Auth::user();
        $countries = Country::all();
        $banks = Bank::all();
        $suppliers = collect([]);
        // dd($user->pharmacies->first()->suppliers);
        foreach($user->pharmacies as $pharmacy){
            $suppliers = $suppliers->merge($pharmacy->suppliers);
        }
        return view('user.suppliers',compact('user','countries','suppliers','banks'));
    }

    public function supplier_save(Request $request){
        // dd($request->all());
        $user = User::find($request->user_id);
        // dd($request->all());
        $supplier = Supplier::updateOrCreate(['email'=> $request->email],['name'=> $request->name,'mobile'=> $request->mobile,
            'country_id'=> $request->country_id,'state_id'=> $request->state_id,'city_id'=> $request->city_id,
            'bank_id'=> $request->bank_id ?? null,'bank_account'=> $request->account_number ?? null]);
        
        $supplier->pharmacies()->sync($user->pharmacies->pluck('id')->toArray());
        if($request->ajax){
            return response()->json(['supplier'=> $supplier],200);
        }else{
            return redirect()->back();
        }
    }
    
    


}