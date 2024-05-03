<?php

namespace App\Http\Controllers\General;

use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Traits\PaystackTrait;
use App\Exports\User\PaymentsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PaymentController extends Controller
{
    use PaystackTrait;

    public function verify() {
        $user = auth()->user();
        // if(!request()->query('trxref'))
        if(!request()->query('reference')) \abort(404);
        $reference = request()->query('reference');
        $payment = Payment::where('reference',$reference)->first();
        //if payment was already successful before now
        if(!$payment || $payment->status == 'success' || $payment->user_id != $user->id){
            \abort(503);
        }
        $details = $this->verifyPayment($payment);
        if(!$details || !$details->status || $details->status != 'success' || !$details->data || $details->data->reference != $payment->reference || ($details->data->amount/100) < $payment->amount){
            $payment->status = 'failed';
            $payment->save();
            return redirect()->route('subscription.create')->with(['flash_message'=> 'Payment was not successful. Please try again','flash_type'=> 'danger']);
        }
        $payment->status = 'success';
        $payment->method = $details->data->channel;
        $payment->save();
        return redirect()->route('subscription.show')->with(['flash_message'=> 'Payment Successful, Now Assign the License to Pharmacy','flash_type'=> 'success']);
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
