<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Plan;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Traits\PaystackTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    use PaystackTrait;

    public function index(Pharmacy $pharmacy){
        $plans = Plan::all();
        $user = Auth::user();
        return view('main.plans',compact('pharmacy','plans'));
    } 

    public function checkout(Request $request, Pharmacy $pharmacy){
        $user = Auth::user();
        $plan = Plan::find($request->plan_id);
        return view('main.user.director.checkout', compact('pharmacy', 'user','plan'));
    }

    public function pay(Request $request) {
        $user = Auth::user();
        $order = Order::create(['user_id'=> $user->id,'orderable_id'=> $request->orderable_id, 'orderable_type'=> $request->orderable_type,'amount'=> $request->amount]);
        return redirect()->to($this->initializePayment($order));
    }

    public function verify() {
        $user = Auth::user();
        if(!request()->query('trxref'))
        return redirect()->route('plans');
        $paymentDetails = json_decode($this->verifyPayment(request()->query('trxref')));
        if(!$paymentDetails)
        return redirect()->route('plans');
        $order_id = $paymentDetails->data->metadata->order_id;
        $payment_status = $paymentDetails->data->status;
        $payment_amount = $paymentDetails->data->amount;
        $payment_method = $paymentDetails->data->channel;
        $customer_email = $paymentDetails->data->customer->email;
        $order = Order::find($order_id);
        $user = User::whereEmail($customer_email)->first();
        if ($payment_status == 'success' && $order->amount == $payment_amount/100) {
            $order->status = true;
            $order->save();
            return redirect()->route('user.order.show',$order);
        }
        return redirect()->intended('dashboard');
    }

}