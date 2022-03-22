<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Supplier;
use App\Models\Item;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class InventoryController extends Controller
{
   
    public function drug(Pharmacy $pharmacy){
        return view('pharmacy.drugs',compact('pharmacy'));
    }
    
    public function inventory(Pharmacy $pharmacy){
        return view('pharmacy.inventory',compact('pharmacy'));
    }
    public function shelf(Pharmacy $pharmacy){
        return view('pharmacy.shelf',compact('pharmacy'));
    }
    
    public function purchase(Pharmacy $pharmacy){
        $user = Auth::user();
        // $suppliers = Supplier::where('pharmacy_id',$pharmacy->id)->get();
        $suppliers = $pharmacy->suppliers;
        $items = Item::all();
        $medicines = Medicine::all();
        $countries = Country::all();
        return view('pharmacy.purchaseOrder',compact('user','pharmacy','suppliers','items','medicines','countries'));
    }


}