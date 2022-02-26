<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;

class SubscriptionController extends Controller
{
    public function index(Pharmacy $pharmacy){
        return view('main.newPharmacy.subscription',compact('pharmacy'));
    }
}
