<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Traits\PharmacyTrait;
use App\Http\Traits\PaystackTrait;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    use PaystackTrait,PharmacyTrait;

    public function verify() {
        \abort_if(!request()->query('trxref'),400);
        $paymentDetails = json_decode($this->verifyPayment(request()->query('trxref')));
        \abort_if(!$paymentDetails || !$paymentDetails->status ,400);
        // dd($paymentDetails);
        $order_id = $paymentDetails->data->metadata->order_id;
        $customer_name = $paymentDetails->data->metadata->name;
        $payment_status = $paymentDetails->data->status;
        $payment_amount = $paymentDetails->data->amount;
        $payment_method = $paymentDetails->data->channel;
        $customer_email = $paymentDetails->data->customer->email;
        // if($)
        $order = Order::find($order_id);
        \abort_if($payment_status != 'success' || $order->amount != $payment_amount/100,503);
        $order->status = true;
        $order->save();
        $payment = Payment::firstOrCreate(['reference'=> request()->query('trxref')],
            ['pharmacy_id'=> $order->pharmacy_id,'payer_name'=> $customer_name,
            'payer_email'=> $customer_email,'currency'=> $order->currency,
            'amount'=> $order->amount,'method'=> $payment_method,'status'=> 'success']);
        $subscription = $this->createSubscription($order->orderable,$pharmacy,$order->quantity);
        
        return redirect()->intended('dashboard');
    }

    public function transactions(){
        return view('user.transactions');
    }
}
