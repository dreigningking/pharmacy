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

    public function index(){
        $plan = Plan::where('name','pharmacy_subscription')->first();
        return view('pricing',compact('plan'));
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
        $order = Order::create(['user_id'=> $user->id,'orderable_id'=> $request->plan_id, 'orderable_type'=> 'App\Models\Plan','quantity'=> $request->quantity ,'amount'=> $plan->amount,'total'=> $request->quantity * $plan->amount]);
        // $order = Order::find(1);
        $response = $this->initializePayment($order);
        if(!$response || !$response->status)
        return redirect()->back()->withErrors(['message'=> 'Service Unavailable'])->withInput();
        else return redirect()->to($response->data->authorization_url);    
    }

    

    public function verify() {
        \abort_if(!request()->query('trxref'),400);
        $paymentDetails = json_decode($this->verifyPayment(request()->query('trxref')));
        \abort_if(!$paymentDetails || !$paymentDetails->status ,400);
        // dd($paymentDetails);
        $order_id = $paymentDetails->data->metadata->order_id;
        $payment_status = $paymentDetails->data->status;
        $payment_amount = $paymentDetails->data->amount;
        $payment_method = $paymentDetails->data->channel;
        $customer_email = $paymentDetails->data->customer->email;
        $order = Order::find($order_id);
        $user = User::whereEmail($customer_email)->first();
        \abort_if($payment_status != 'success' || $order->amount != $payment_amount/100,503);
        $order->status = true;
        $order->save();
        $subscription = $this->createSubscription($order->orderable,$pharmacy,$order->quantity);
        $payment = Payment::firstOrCreate(['reference'=> request()->query('trxref')],['user_id'=> $user->id,'order_id'=>$order->id,'currency'=> $user->country->currency_iso,'amount'=> $order->amount,'method'=> $payment_method,'status'=> 'success']);
        return redirect()->intended('dashboard');
    }

    public function invoice(){
        $user = Auth::user();
        return view('invoice',compact('user'));
    }

}