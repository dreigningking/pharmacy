<?php

namespace App\Http\Controllers\General;

use App\Models\User;
use App\Models\Batch;
use App\Models\Pharmacy;
use App\Models\Transfer;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\TransferDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    
    public function list(Pharmacy $pharmacy){
        $transfers = Transfer::where(function($query) use($pharmacy) { $query->where('from_pharmacy',$pharmacy->id)->orWhere('to_pharmacy',$pharmacy->id)->whereNotNull('sent_at'); })->get();
        return view('pharmacy.inventory.transfers.list',compact('pharmacy','transfers'));
    }
    
    public function create(Pharmacy $pharmacy){
        $user = Auth::user();
        $pharmacies = $user->pharmacies;
        return view('pharmacy.inventory.transfers.new',compact('pharmacy','pharmacies'));
    }

    public function create_from_inventory(Pharmacy $pharmacy,Request $request){
        $user = User::find($request->user_id);
        $pharmacies = $user->pharmacies;
        $inventories = Inventory::whereIn('id',$request->inventories)->get();
        return view('pharmacy.inventory.transfers.new',compact('pharmacy','pharmacies','inventories'));
    }

    public function batches(Pharmacy $pharmacy){
        if($search = request()->search){
            $items =  Batch::with('inventory')->whereHas('inventory',function($query) use($pharmacy,$search){
                $query->where('pharmacy_id',$pharmacy->id)->where('name','LIKE',"%$search%");})->get();
        }else{
        $items = Batch::with('inventory')->whereHas('inventory',function($query) use($pharmacy){
            $query->where('pharmacy_id',$pharmacy->id); })->get();
        }
        return response()->json(['items'=> $items],200);
    }

    public function edit(Pharmacy $pharmacy,Transfer $transfer){
        $user = Auth::user();
        $pharmacies = $user->pharmacies;
        //dd($transfer->details);
        return view('pharmacy.inventory.transfers.edit',compact('pharmacy','pharmacies','transfer'));
    }

    public function show(Pharmacy $pharmacy,Transfer $transfer){
        return view('pharmacy.inventory.transfers.view',compact('pharmacy','transfer'));
    }

    public function store(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        
        $transfer = Transfer::create(['reference'=> uniqid(),'sending_user'=> auth()->id(),'from_pharmacy'=> $pharmacy->id,'to_pharmacy'=> $request->to_pharmacy,'total'=> collect(array_filter($request->amounts))->sum(),'info'=> $request->info]);
        foreach ($request->batches as $key => $batch) {
            $_batch = Batch::find($batch);
            $detail = TransferDetail::create(['transfer_id'=> $transfer->id,
            'inventory_id'=> $_batch->inventory_id,'batch_id'=> $batch,'unit_cost'=> $request->costs[$key],
            'quantity'=> $request->quantities[$key],'amount'=> $request->amounts[$key]
            ]);
        }
        if($request->send){
            $transfer->sent_at = now();
            $transfer->save();
        }
        return redirect()->route('pharmacy.transfer.list',$pharmacy);
    }

    public function update(Pharmacy $pharmacy, Request $request){
        //dd($request->all());
        $transfer = Transfer::where('id',$request->transfer_id)->update(['sending_user'=> auth()->id(),'to_pharmacy'=> $request->to_pharmacy,'total'=> collect(array_filter($request->amounts))->sum(),'info'=> $request->info]);
        foreach (array_filter($request->batches) as $key => $batch) {
            $_batch = Batch::find($batch);
            $detail = TransferDetail::where('transfer_id',$request->transfer_id)->where('batch_id',$_batch->id)->first();
            if($detail){
                $detail->inventory_id = $_batch->inventory_id;
                $detail->unit_cost = $request->costs[$key];
                $detail->quantity = $request->quantities[$key];
                $detail->amount = $request->amounts[$key];
                $detail->save();
            } 
            else{
                $detail = TransferDetail::create(['transfer_id'=> $transfer->id,
                    'inventory_id'=> $_batch->inventory_id,'batch_id'=> $batch,'unit_cost'=> $request->costs[$key],
                    'quantity'=> $request->quantities[$key],'amount'=> $request->amounts[$key]
                ]);
            }
            
        }
        TransferDetail::where('transfer_id',$request->transfer_id)->whereNotIn('batch_id',$request->batches)->delete();
        if($request->send){
            $transfer = Transfer::find($request->transfer_id);
            $transfer->sent_at = now();
            $transfer->save();
        }
        return redirect()->route('pharmacy.transfer.list',$pharmacy);
    }
    
    public function save_to_inventory(Pharmacy $pharmacy,Request $request){
        $transfer = Transfer::find($request->transfer_id);
        if($request->accept){
            
            foreach($transfer->details as $detail){
                $inventory = Inventory::updateOrCreate(
                    ['name'=> $detail->inventory->name,'drug_id'=> $detail->inventory->drug_id,'pharmacy_id'=> $pharmacy->id],
                    ['category'=> $detail->inventory->category,
                    'unit_cost'=> $detail->unit_cost,
                    'unit_price'=> $detail->inventory->unit_price,
                    'minimum_stocklevel'=> $detail->inventory->minimum_stocklevel,
                    'maximum_stocklevel'=> $detail->inventory->maximum_stocklevel,
                ]);
                $sender_batch = Batch::find($detail->batch_id);
                $receiver_batch = Batch::where('inventory_id',$inventory->id)->where('number',$sender_batch->number)->first();
                if($receiver_batch){
                    $receiver_batch->quantity = $receiver_batch->quantity + $detail->quantity;
                    $receiver_batch->save();
                }else Batch::create(['inventory_id'=>$inventory->id,'number'=> $sender_batch->number,'quantity'=> $detail->quantity,'expire_at'=> $sender_batch->expire_at]);
                $sender_batch->quantity = $sender_batch->quantity - $detail->quantity;
                $sender_batch->save();
            }   
            $transfer->accepted_at = now();
            $transfer->status = true;
            $transfer->save();
        }else{
            $transfer->rejected_at = now();
            $transfer->status = true;
            $transfer->save();
        }
        
        return redirect()->route('pharmacy.transfer.list',$pharmacy);
    }

    public function delete(Pharmacy $pharmacy,Request $request){
        $transfer = Transfer::find($request->transfer_id);
        $transfer->delete();
        return redirect()->route('pharmacy.transfer.list',$pharmacy);
    }

}
