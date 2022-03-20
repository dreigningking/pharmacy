<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Disease;
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


}