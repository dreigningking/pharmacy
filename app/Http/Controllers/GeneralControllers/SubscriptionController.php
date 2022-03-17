<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Pharmacy;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Traits\PaystackTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    use PaystackTrait;

    public function index(){
        $plan = Plan::where('name','pharmacy_subscription')->first();
        return view('main.pricing',compact('plan'));
    } 

    public function checkout(){
        abort_if(!request()->query() || !request()->query('id'),403);
        $plan = Plan::find(request()->query('id'));
        $trial = $plan->trial && request()->query('trial') ? 1:0;
        return view('main.user.director.checkout', compact('plan','trial'));
    }

    public function pay(Request $request) {
        // dd($request->all());
        $user = Auth::user();
        $plan = Plan::find($request->plan_id);
        if($request->trial){
            $subscription = $this->create($plan,$user,true);
            return redirect()->route('dashboard');
        }
        $order = Order::create(['user_id'=> $user->id,'orderable_id'=> $request->plan_id, 'orderable_type'=> 'App\Models\Plan','amount'=> $plan->amount]);
        // $order = Order::find(1);
        $response = $this->initializePayment($order);
        if(!$response || !$response->status)
        return redirect()->back()->withErrors(['message'=> 'Service Unavailable'])->withInput();
        else return redirect()->to($response->data->authorization_url);    
    }

    public function create(Plan $plan,User $user,$trial = false){
        $trial= false;
        $start = Carbon::now();
        $end = Carbon::now()->addMonths($plan->duration);
        $trial_end = Carbon::now()->addDays($plan->trial);
        $warn = $trial ? Carbon::now()->addDays($plan->trial)->subDays(2) : Carbon::now()->addMonths($plan->duration)->subWeeks(2);
        $subscription = Subscription::create(['user_id'=> $user->id,
        'plan_id'=> $plan->id,'trial'=> $trial,
        'start'=> $start,
        'end'=> $trial ? $trial_end : $end,'warn'=> $warn,
        'status'=> true]);
        return $subscription;
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
        $subscription = $this->create($order->orderable,$user);
        $payment = Payment::firstOrCreate(['reference'=> request()->query('trxref')],['user_id'=> $user->id,'order_id'=>$order->id,'currency'=> $user->country->currency_iso,'amount'=> $order->amount,'method'=> $payment_method,'status'=> 'success']);
        return redirect()->intended('dashboard');
    }

}