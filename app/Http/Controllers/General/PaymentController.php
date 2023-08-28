<?php

namespace App\Http\Controllers\General;

use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Traits\PaystackTrait;
use App\Http\Traits\PharmacyTrait;
use App\Exports\User\PaymentsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

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

        $payment = Payment::firstOrCreate(['reference'=> request()->query('trxref')],
            ['pharmacy_id'=> 1,'status'=> 'success']);
        // $subscription = $this->createSubscription($order->orderable,$pharmacy,$order->quantity);
        
        return redirect()->intended('dashboard');
    }

    public function transactions(){
        $user = auth()->user();
        $sortBy = null;
        $type = null;
        $from_date = null;
        $to_date = null;
        $payments = Payment::where('user_id',$user->id);
        if(request()->query() && request()->query('type')){
            $type = request()->query('type');
            $payments = $payments->whereIn('purpose',$type);
        }
        if(request()->query() && request()->query('from_date')){
            $from_date = request()->query('from_date');
            $payments = $payments->where('created_at','>=',Carbon::createFromFormat('d/m/Y',$from_date));
        }
        if(request()->query() && request()->query('to_date')){
            $to_date = request()->query('to_date');
            $payments = $payments->where('created_at','<=',Carbon::createFromFormat('d/m/Y',$to_date));
        }

        if(request()->query() && request()->query('sortBy')){
            $sortBy = request()->query('sortBy');
            if(request()->query('sortBy') == 'date_asc'){
                $payments = $payments->orderBy('created_at','asc');
            }
            if(request()->query('sortBy') == 'date_desc'){
                $payments = $payments->orderBy('created_at','desc');
            }
        }
        if(request()->query() && request()->query('download')){
            return Excel::download(new PaymentsExport($payments->get()),'payments.xlsx');
        }
        $payments = $payments->paginate(30);
        $min_date = $payments->total() ? $payments->min('created_at')->format('Y-m-d') : null;
        $max_date = $payments->total() ? $payments->max('created_at')->format('Y-m-d') : null;
        return view('user.transactions',compact('payments','min_date','max_date','from_date','to_date','type','sortBy'));
    }

    public function invoice(Payment $payment){
        return view('invoice',compact('payment'));
    }
}
