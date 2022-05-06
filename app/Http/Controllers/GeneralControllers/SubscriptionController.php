<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Traits\PharmacyTrait;
use App\Http\Traits\PaystackTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    use PaystackTrait,PharmacyTrait;

    public function index(Pharmacy $pharmacy){
        $plan = Plan::where('name','pharmacy_subscription')->first();
        // dd($plan);
        return view('pricing',compact('pharmacy','plan'));
    } 

    public function checkout(Pharmacy $pharmacy,Plan $plan){
        return view('user.checkout', compact('pharmacy','plan'));
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