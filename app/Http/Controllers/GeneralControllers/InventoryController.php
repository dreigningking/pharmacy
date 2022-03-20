<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Supplier;
use App\Models\Medicine;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class InventoryController extends Controller
{
   
    public function drug(Pharmacy $pharmacy){
        return view('pharmacy.drugs',compact('pharmacy'));
    }
    public function supply(Pharmacy $pharmacy){
        $suppliers = Supplier::where('pharmacy_id',$pharmacy->id)->get();
        return view('pharmacy.supply',compact('pharmacy','suppliers'));
    }
    public function inventory(Pharmacy $pharmacy){
        return view('pharmacy.inventory',compact('pharmacy'));
    }
    public function shelf(Pharmacy $pharmacy){
        return view('pharmacy.shelf',compact('pharmacy'));
    }


}