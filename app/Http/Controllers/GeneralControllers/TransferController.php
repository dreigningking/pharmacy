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
        return view('pharmacy.transfers.list',compact('pharmacy','transfers'));
    }
    
    public function create(Pharmacy $pharmacy){
        $user = Auth::user();
        $pharmacies = $user->pharmacies;
        return view('pharmacy.transfers.new',compact('pharmacy','pharmacies'));
    }
    public function create_from_inventory(Pharmacy $pharmacy,Request $request){
        $user = User::find($request->user_id);
        $pharmacies = $user->pharmacies;
        $inventories = Inventory::whereIn('id',$request->inventories)->get();
        return view('pharmacy.transfers.new',compact('pharmacy','pharmacies','inventories'));
    }
    public function store(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
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
        return redirect()->route('pharmacy.transfer.list',$pharmacy);
    }
    public function add_to_inventory(Pharmacy $pharmacy,Request $request){
        
    }
    public function delete(Pharmacy $pharmacy,Request $request){

    }
}
