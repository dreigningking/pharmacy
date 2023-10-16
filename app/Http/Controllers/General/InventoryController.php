<?php

namespace App\Http\Controllers\General;

use App\Models\Drug;
use App\Models\User;
use App\Models\Batch;
use App\Models\Country;

use App\Models\Pharmacy;
use App\Models\Supplier;
use App\Models\Inventory;
use App\Models\DrugCategory;
use Illuminate\Http\Request;
use App\Exports\InventoriesExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\User\InventoriesImport;

class InventoryController extends Controller
{

    public function list(Pharmacy $pharmacy){
        $search = '';
        $type = ['drug','non_drug'];
        $show = '';
        $items = Inventory::where('pharmacy_id',$pharmacy->id);
        if($search = request()->search){
            $items =  $items->where('name','LIKE',"%$search%");
        }
        if(request()->type && is_array(request()->type) && count(request()->type) < 2){
            if(in_array('drug',request()->type)){
                $items =  $items->whereNotNull('drug_id');
            }else{
                $items =  $items->whereNull('drug_id');   
            }
            $type = request()->type;
        }
        if($show = request()->show){
            switch($show){
                case 'expired': $items = $items->whereHas('batches',function($query){ $query->where('expire_at','<',today());});
                    break;
                case 'expiring': $items = $items->whereHas('batches',function($query){ $query->where('expire_at','<',today()->addMonths(6));});
                    break;
                case 'out_of_stock': $items = $items->where('quantity',0);
                    break;
                case 'over_stock': $items = $items->whereColumn('quantity','>','maximum_stocklevel');
                    break;
                case 'under_stock': $items = $items->whereColumn('quantity','<','minimum_stocklevel');
                    break;
            }
        }

        if(request()->expectsJson())
            return response()->json(['items'=> $items->get()],200);
        else 
        $items =  $items->paginate(15);
        return view('pharmacy.inventory.items.all',compact('pharmacy','items','search','type','show'));
    }

    public function expired(Pharmacy $pharmacy){
        $name = '';
        $type = ['drug','non_drug'];
        $items = Batch::where('expire_at','<',today());
        $items = $items->whereHas('inventory',function($query) use($pharmacy){
            $query->where('pharmacy_id',$pharmacy->id);
        });

        if($name = request()->name){
            $items =  $items->whereHas('inventory',function($query) use($name){
                $query->where('name','LIKE',"%$name%");
            });
        }
        
        if(request()->type && is_array(request()->type) && count(request()->type) < 2){
            if(in_array('drug',request()->type)){
                $items =  $items->whereHas('inventory',function($query) use($name){
                    $query->whereNotNull('drug_id');
                });
            }else{
                $items =  $items->whereHas('inventory',function($query) use($name){
                    $query->whereNull('drug_id');
                }); 
            }
            $type = request()->type;
        }

        if(request()->expectsJson())
            return response()->json(['items'=> $items->get()],200);
        else 
        $items =  $items->paginate(15);
        return view('pharmacy.inventory.items.expired',compact('pharmacy','items','name','type'));
    }

    public function expiringsoon(Pharmacy $pharmacy){
        $name = '';
        $type = ['drug','non_drug'];
        $items = Batch::where('expire_at','<',today()->addMonths(6));
        $items = $items->whereHas('inventory',function($query) use($pharmacy){
            $query->where('pharmacy_id',$pharmacy->id);
        });

        if($name = request()->name){
            $items =  $items->whereHas('inventory',function($query) use($name){
                $query->where('name','LIKE',"%$name%");
            });
        }
        
        if(request()->type && is_array(request()->type) && count(request()->type) < 2){
            if(in_array('drug',request()->type)){
                $items =  $items->whereHas('inventory',function($query) use($name){
                    $query->whereNotNull('drug_id');
                });
            }else{
                $items =  $items->whereHas('inventory',function($query) use($name){
                    $query->whereNull('drug_id');
                }); 
            }
            $type = request()->type;
        }
        if(request()->expectsJson())
            return response()->json(['items'=> $items->get()],200);
        else 
        $items =  $items->paginate(15);
        return view('pharmacy.inventory.items.expiring_soon',compact('pharmacy','items','name','type'));
    }

    public function outOfStock(Pharmacy $pharmacy){
        $name = '';
        $type = ['drug','non_drug'];
        $items = Inventory::where('pharmacy_id',$pharmacy->id)->where('quantity',0);
        if($name = request()->name){
            $items =  $items->where('name','LIKE',"%$name%");
        }
        if(request()->type && is_array(request()->type) && count(request()->type) < 2){
            if(in_array('drug',request()->type)){
                $items =  $items->whereNotNull('drug_id');
            }else{
                $items =  $items->whereNull('drug_id');   
            }
            $type = request()->type;
        }

        if(request()->expectsJson())
            return response()->json(['items'=> $items->get()],200);
        else 
        $items =  $items->paginate(15);
        return view('pharmacy.inventory.items.out_of_stock',compact('pharmacy','items','name','type'));
    }

    public function overStocked(Pharmacy $pharmacy){
        $name = '';
        $type = ['drug','non_drug'];
        $items = Inventory::where('pharmacy_id',$pharmacy->id)->whereColumn('quantity','>','maximum_stocklevel');
        if($name = request()->name){
            $items =  $items->where('name','LIKE',"%$name%");
        }
        if(request()->type && is_array(request()->type) && count(request()->type) < 2){
            if(in_array('drug',request()->type)){
                $items =  $items->whereNotNull('drug_id');
            }else{
                $items =  $items->whereNull('drug_id');   
            }
            $type = request()->type;
        }


        if(request()->expectsJson())
            return response()->json(['items'=> $items->get()],200);
        else 
        $items =  $items->paginate(15);
        return view('pharmacy.inventory.items.over_stock',compact('pharmacy','items','name','type'));
    }

    public function underStocked(Pharmacy $pharmacy){
        $name = '';
        $type = ['drug','non_drug'];
        $items = Inventory::where('pharmacy_id',$pharmacy->id)->whereColumn('quantity','<','minimum_stocklevel');
        if($name = request()->name){
            $items =  $items->where('name','LIKE',"%$name%");
        }
        if(request()->type && is_array(request()->type) && count(request()->type) < 2){
            if(in_array('drug',request()->type)){
                $items =  $items->whereNotNull('drug_id');
            }else{
                $items =  $items->whereNull('drug_id');   
            }
            $type = request()->type;
        }


        if(request()->expectsJson())
            return response()->json(['items'=> $items->get()],200);
        else 
        $items =  $items->paginate(15);
        return view('pharmacy.inventory.items.under_stock',compact('pharmacy','items','name','type'));
    }

    public function batches(Pharmacy $pharmacy,Request $request){
        //dd($request->all());
        $inventory = Inventory::find($request->inventory_id);
        foreach($request->batch as $key => $number){
                $batch = Batch::updateOrCreate(['number'=> $number,'inventory_id'=> $request->inventory_id],
                ['quantity'=> $request->input("quantity.$key"),'expire_at'=> $request->input("expire_at.$key")]);
        }
        Batch::where('inventory_id',$request->inventory_id)->whereNotIn('number',$request->batch)->delete();
        return redirect()->back();
    }

    public function store(Request $request,Pharmacy $pharmacy){
        // dd($request->all());
        
            if($request->many){
                for($i = 0;$i < count($request->drug_id) ;$i++){
                    // dd($request->input("name.2"));
                    if(!$inventory = Inventory::where('pharmacy_id',$pharmacy->id)->where('drug_id',$request->input("drug_id.$i"))->first()){
                        $inventory = new Inventory;
                    }
                    $inventory->drug_id = $request->input("drug_id.$i");
                    $inventory->pharmacy_id = $pharmacy->id;
                    $inventory->category = $request->input("category.$i");
                    $inventory->name = $request->input("name.$i");
                    $inventory->save();
                }
            }
            else{
                Inventory::create(['drug_id'=> $request->input('drug_id'),'pharmacy_id'=> $pharmacy->id,'category'=> $request->input('category'),
                    'name'=> $request->input('name'),'shelf'=> $request->input('shelf'),'unit_cost'=> $request->input('unit_cost'),
                    'unit_price'=> $request->input('unit_price'),'minimum_stocklevel'=> $request->input('minimum_stocklevel'),
                    'maximum_stocklevel' => $request->input('maximum_stocklevel') ]);
            }
        return redirect()->back();
    }

    public function update(Pharmacy $pharmacy,Request $request){
        // dd($request->input('unit_of_sales'));
        Inventory::where('id',$request->inventory_id)->update(['category'=> $request->input('category'),
            'name'=> $request->input('name'),'shelf'=> $request->input('shelf'),'unit_cost'=> $request->input('unit_cost'),
            'unit_price'=> $request->input('unit_price'),'minimum_stocklevel'=> $request->input('minimum_stocklevel'),
            'maximum_stocklevel' => $request->input('maximum_stocklevel'),'unit_of_sales'=> $request->input('unit_of_sales'),
            'expiry_alert_weeks'=> $request->input('expiry_alert_weeks'),'quantity'=> $request->quantity ]);
        return redirect()->back();
    }

    public function show(Pharmacy $pharmacy,Inventory $item){ 
        return view('pharmacy.inventory.items.view',compact('pharmacy','item'));
    }

    public function settings(Pharmacy $pharmacy){
        return view('pharmacy.inventory.settings',compact('pharmacy'));
    }

    public function drugs(Pharmacy $pharmacy){  
        // dd(request()->all());
        $show_inventory_drugs = true;
        $drugs = Drug::where('status',true);
        if($name = request()->search)
        $drugs = $drugs->where('name','LIKE',"%$name%");
        if($manufacturer = request()->manufacturer)
        $drugs = $drugs->where('manufacturer','LIKE',"%$name%");
        if($categoriz = request()->categories)
        $drugs = $drugs->whereIn('category_id',$categoriz);
        if(!request()->show_inventory_drugs){
            $drugs = $drugs->whereDoesntHave('inventories',function($query) use($pharmacy){ $query->where('pharmacy_id',$pharmacy->id); });
            $show_inventory_drugs = false;
        }
        
        $categories = DrugCategory::all();
        if(request()->expectsJson()){
            $drugs = $drugs->get();
            return response()->json(['drugs'=> $drugs],200);
        }else{
            $drugs = $drugs->paginate(50);
            return view('pharmacy.inventory.drugs',compact('drugs','categories','pharmacy','show_inventory_drugs'));
        }   
            
            
    }


    // public function start(Pharmacy $pharmacy){
    //     $drugs = Drug::all();
    //     dd('ok');
    //     return view('pharmacy.inventory.start',compact('pharmacy','drugs'));
    // }

    public function download(Pharmacy $pharmacy,Request $request){
        Excel::import(new InventoriesExport, $request->file('your_file'));
        return redirect()->back()->with('success', 'All good!');
    }

    public function import(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        Excel::import(new InventoriesImport, $request->file('inventories'));
        return redirect()->route('pharmacy.inventory.index',$pharmacy)->with('success', 'All good!');
    }

    public function suppliers(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        if($request->supplier_id){
            Supplier::where('id',$request->supplier_id)->delete();
            if($request->ajax){
                return response()->json(['message'=> 'Supplier Deleted'],200);
            }else{
                return redirect()->back();
            }
        }else{
            $supplier = Supplier::updateOrCreate(['email'=> $request->email,'pharmacy_id'=> $pharmacy->id],['name'=> $request->name,'mobile'=> $request->mobile,'location'=> $request->location]);
            if($request->ajax){
                return response()->json(['supplier'=> $supplier],200);
            }else{
                return redirect()->back();
            }
        }
        
        
    }
    

}