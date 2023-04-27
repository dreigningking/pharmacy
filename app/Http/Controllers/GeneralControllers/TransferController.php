<?php

namespace App\Http\Controllers\GeneralControllers;

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
        $transfers = Transfer::where('from_pharmacy',$pharmacy->id)->orWhere('to_pharmacy',$pharmacy->id)->get();
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

    public function store(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        if($pharmacy->id == $request->to_pharmacy){
            return redirect()->route('pharmacy.inventory.transfers.list',$pharmacy);
        }
        $transfer = Transfer::create(['sending_user'=> $request->user_id,'from_pharmacy'=> $pharmacy->id,'to_pharmacy'=> $request->to_pharmacy,'total'=> collect(array_filter($request->amounts))->sum(),'info'=> $request->info]);
        foreach ($request->batches as $key => $batch) {
            $_batch = Batch::find($batch);
            $detail = TransferDetail::create(['transfer_id'=> $transfer->id,
            'inventory_id'=> $_batch->inventory_id,'batch_id'=> $batch,'unit_cost'=> $request->costs[$key],
            'quantity'=> $request->quantities[$key],'amount'=> $request->amounts[$key]
            ]);
        }
        if($request->action == "execute"){
            //$this->restock($purchase);
        }
        return redirect()->route('pharmacy.inventory.transfers.list',$pharmacy);
    }
    
    public function save_to_inventory(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        $transfer = Transfer::find($request->transfer_id);
        foreach($transfer->details as $detail){
            $inventory = Inventory::updateOrCreate(['name'=> $detail->inventory->name],
            ['unit_cost'=> $detail->unit_cost,'unit_price'=> $detail->inventory->unit_price,'profit'=> $detail->inventory->unit_price]);
            $sender_batch = Batch::find($detail->batch_id);
            $receiver_batch = Batch::where('inventory_id',$inventory->id)->where('number',$sender_batch->number)->first();
            if($receiver_batch){
                $receiver_batch->quantity = $receiver_batch->quantity + $detail->quantity;
                $receiver_batch->save();
            }else Batch::create(['inventory_id'=>$inventory->id,'number'=> $sender_batch->number,'quantity'=> $detail->quantity,'expire_at'=> $sender_batch->expiry_at]);
        }
        $transfer->status = true;
        $transfer->save();
        return redirect()->route('pharmacy.inventory.transfers.list',$pharmacy);
    }

    public function delete(Pharmacy $pharmacy,Request $request){
        $transfer = Transfer::find($request->transfer_id);
        $transfer->delete();
        return redirect()->route('pharmacy.inventory.transfers.list',$pharmacy);
    }

}
