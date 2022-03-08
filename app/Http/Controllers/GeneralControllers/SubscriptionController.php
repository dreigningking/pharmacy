<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index(Pharmacy $pharmacy){
        $plans = Plan::all();
        return view('main.plans',compact('pharmacy','plans'));
    } 

    public function checkout(Request $request, Pharmacy $pharmacy){
        // dd($request->all());
        $plan = Plan::find($request->plan_id);
        $user = Auth::user();
        return view('main.user.director.checkout', compact('pharmacy', 'user','plan'));
    }
    public function pay() {
        
    }
}