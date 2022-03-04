<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\Plan;

class SubscriptionController extends Controller
{
    public function index(Pharmacy $pharmacy){
        $plans = Plan::all();
        return view('main.director.pharmacy.subscription',compact('pharmacy','plans'));
    } 

    public function checkout(){
        return view('main.director.checkout');
    }
}