<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Traits\PaystackTrait;
use App\Http\Traits\PharmacyTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    use PaystackTrait,PharmacyTrait;

    public function index(){
        $user = Auth::user();
        return view('user.subscription',compact('user'));
    }

    public function pricing(){
        $plans = Plan::all();
        return view('pricing',compact('plans'));
    }
    
    /*
        $pharmacy_plan = ['name'=> 'Pharmacy Management Plan,'description'=> '','yearly_price_ngn'=> '','yearly_price_usd'=> '','monthly_price_ngn'=> ''
        ,'monthly_price_usd'=> '','minimum_duration_months'=> '','trial_duration_days'=> ''];

    */
    

    public function checkout(Plan $plan){
        return view('user.checkout', compact('plan'));
    }

    public function planPayment(Request $request) {
        // dd($request->all());
        $user = Auth::user();
        $plan = Plan::find($request->plan_id);
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        if($request->trial && $pharmacy->subscriptions->isEmpty()){
            $subscription = $this->createSubscription($plan,$pharmacy,$plan->trial,true);
            return redirect()->route('dashboard');
        }
        $order = Order::create(['pharmacy_id'=> $pharmacy->id,'subtotal'=> $request->quantity * $plan->amount,'vat'=> 0,'total'=> $request->quantity * $plan->amount]);
        $orderdetails = OrderDetails::create([
            'order_id'=> $order->id,'orderable_id'=> $request->plan_id,'orderable_type'=> 'App\Models\Plan',
            'quantity'=> $request->quantity ,'amount'=> $plan->amount, 'total'=> $request->quantity * $plan->amount,
        ]);
        $response = $this->initializePayment($order->amount,$order->id, $user->name,$user->email);
        if(!$response || !$response->status)
        return redirect()->back()->withErrors(['message'=> 'Service Unavailable'])->withInput();
        else return redirect()->to($response->data->authorization_url);    
    }

    public function invoice(){
        $user = Auth::user();
        return view('invoice',compact('user'));
    }

}