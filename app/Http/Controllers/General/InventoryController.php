<?php

namespace App\Http\Controllers\General;

use App\Models\Drug;
use App\Models\Batch;
use App\Models\Pharmacy;
use App\Models\Supplier;
use App\Models\Inventory;
use App\Models\DrugCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class InventoryController extends Controller
{

    public function list(Pharmacy $pharmacy){
        $search = request()->search ?? null;
        // dd($search);
        $type = request()->type ?? 'both';
        $show = request()->show ?? 'all';
        $items = Inventory::where('pharmacy_id',$pharmacy->id);
        if($search) $items =  $items->where('name','LIKE',"%$search%");
        if($type == 'drugs') $items =  $items->whereNotNull('drug_id');
        if($type == 'non-drugs') $items =  $items->whereNull('drug_id');
        if($show != 'all'){
            switch($show){
                case 'out_of_stock': $items = $items->where('quantity',0);
                    break;
                case 'over_stock': $items = $items->whereColumn('quantity','>','maximum_stocklevel');
                    break;
                case 'under_stock': $items = $items->where('quantity','!=',0)->whereColumn('quantity','<','minimum_stocklevel');
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
        $expiry = 6;
        $type = ['drug','non_drug'];
        
        $items = Batch::where('expire_at','>',now())->whereHas('inventory',function($query) use($pharmacy){
            $query->where('pharmacy_id',$pharmacy->id);
        });
        if($xpiry = request()->expiry)
        $items = $items->where('expire_at','<',today()->addMonths($expiry));
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
        return view('pharmacy.inventory.items.expiring_soon',compact('pharmacy','items','name','type','expiry'));
    }
    
    public function create(Pharmacy $pharmacy){
        return view('pharmacy.inventory.items.create',compact('pharmacy'));
    }

   /*
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
    */

    public function store(Request $request,Pharmacy $pharmacy){
        // dd($request->all());
        $inventory = Inventory::create(['drug_id'=> $request->input('drug_id'),'pharmacy_id'=> $pharmacy->id,'category'=> $request->input('category') ?? $request->input('drug_category'),
            'name'=> $request->input('name'),'shelf'=> $request->input('shelf'),'unit_cost'=> $request->input('unit_cost'),
            'unit_price'=> $request->input('unit_price'),'minimum_stocklevel'=> $request->input('minimum_stocklevel'),
            'maximum_stocklevel' => $request->input('maximum_stocklevel') ]);
            foreach($request->batch as $key => $number){
                $batch = Batch::updateOrCreate(['number'=> $number,'inventory_id'=> $inventory->id],
                ['quantity'=> $request->input("quantity.$key"),'expire_at'=> $request->input("expire_at.$key")]);
        }

        return redirect()->route('pharmacy.inventory.list',$pharmacy);
    }

    public function storeMany(Request $request,Pharmacy $pharmacy){
        //dd($request->all());
        $inventories = collect([]);
        foreach($request->drug_id as $drug){
            $inventory = Inventory::create(['pharmacy_id'=> $pharmacy->id,
            'drug_id'=> $drug,'category' => $request->category[$drug],
            'name' => $request->name[$drug]]);
            $inventories->push($inventory);     
        }
        return view('pharmacy.inventory.supplies.new',compact('pharmacy','inventories'));
    }

    public function update(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        Inventory::where('id',$request->inventory_id)->update(['category'=> $request->input('category'),
            'name'=> $request->input('name'),'shelf'=> $request->input('shelf'),'unit_cost'=> $request->input('unit_cost'),
            'unit_price'=> $request->input('unit_price'),'minimum_stocklevel'=> $request->input('minimum_stocklevel'),
            'maximum_stocklevel' => $request->input('maximum_stocklevel'),'unit_of_sales'=> $request->input('unit_of_sales'),
            'expiry_alert_weeks'=> $request->input('expiry_alert_weeks') ]);
        foreach($request->batch as $key => $number){
                $batch = Batch::updateOrCreate(['number'=> $number,'inventory_id'=> $request->inventory_id],
                ['quantity'=> $request->input("quantity.$key"),'expire_at'=> $request->input("expire_at.$key")]);
        }
        Batch::where('inventory_id',$request->inventory_id)->whereNotIn('number',$request->batch)->delete();
        return redirect()->back();
    }

    public function show(Pharmacy $pharmacy,Inventory $item){ 
        return view('pharmacy.inventory.items.view',compact('pharmacy','item'));
    }

    public function settings(Pharmacy $pharmacy){
        return view('pharmacy.inventory.settings',compact('pharmacy'));
    }

    public function import(Pharmacy $pharmacy,Request $request){

    }

    public function export_template(Pharmacy $pharmacy){
        
    }

    public function drugs(Pharmacy $pharmacy){  
        // dd(request()->all());
        $hide_inventory_drugs = request()->hide_inventory_drugs ?? null;
        $drugs = Drug::where('status',true);
        if($name = request()->search)
        $drugs = $drugs->where('name','LIKE',"%$name%");
        if($manufacturer = request()->manufacturer)
        $drugs = $drugs->where('manufacturer','LIKE',"%$name%");
        if($categoriz = request()->categories)
        $drugs = $drugs->whereIn('category_id',$categoriz);

        if($hide_inventory_drugs){
            $drugs = $drugs->whereDoesntHave('inventories',function($query) use($pharmacy){ $query->where('pharmacy_id',$pharmacy->id); });
            $hide_inventory_drugs = true;
        }
        $categories = DrugCategory::all();
        if(request()->expectsJson()){
            $drugs = $drugs->get();
            return response()->json(['drugs'=> $drugs],200);
        }else{
            $drugs = $drugs->paginate(30);
            return view('pharmacy.inventory.drugs',compact('drugs','categories','pharmacy','hide_inventory_drugs'));
        }   
            
            
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