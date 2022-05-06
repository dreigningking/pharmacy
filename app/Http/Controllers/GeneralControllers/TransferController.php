<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\User;
use App\Models\Inventory;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Transfer;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function list(Pharmacy $pharmacy){
        $user = Auth::user();
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
        return redirect()->route('pharmacy.purchase.list',$pharmacy);
    }
    public function add_to_inventory(Pharmacy $pharmacy,Request $request){
        
    }
    public function delete(Pharmacy $pharmacy,Request $request){

    }
}
