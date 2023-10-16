<?php

namespace App\Http\Controllers\General;

use App\Models\Plan;
use App\Models\User;
use App\Models\Order;
use App\Models\License;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\SmsUnit;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Traits\PaystackTrait;
use App\Http\Traits\PharmacyTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    use PaystackTrait,PharmacyTrait;

    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        // dd(uniqid('',true));
        // dd(str_shuffle(str_replace('.','',strtoupper(uniqid('',true).time()))));
        return view('price');
    }

    public function show(){
        $user = auth()->user();
        $sms_cost = Setting::where('name','sms_plan')->first()->items["price_$user->currency"];
        return view('user.subscription.manage',compact('user','sms_cost'));
    }

    public function create(){
        $user = auth()->user();
        $pharmacy = Setting::where('name','pharmacy_plan')->first();
        $analytics = Setting::where('name','analytics_plan')->first();
        $subscription_trial_days = Setting::where('name','subscription_trial_days')->first()->value;
        $subscription_discount = Setting::where('name','subscription_discount')->first()->items;
        return view('user.subscription.create',compact('user','pharmacy','analytics','subscription_trial_days','subscription_discount'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'trial' => 'required|boolean',
            'total' => 'required',
            'discount' => 'required',
            'price' => 'required',
            'licenses' => 'required|numeric',
            'subscription' => 'required|string',
            'period' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            if(in_array('web',$request->route()->action['middleware']))
            return redirect()->back()->withErrors($validator)->withInput()->with(['flash_message'=> 'Something is wrong','flash_type'=> 'danger']);
            else return response()->json(json_decode($validator->errors(), true));
        }
        $user = auth()->user();
        $subscription_trial_days = Setting::where('name','subscription_trial_days')->first()->value;
        $pharmacy = Setting::where('name','pharmacy_plan')->first();
        if($request->trial && $user->licenses->isNotEmpty()){
            if(in_array('web',$request->route()->action['middleware']))
            return redirect()->back()->with(['flash_message'=> 'Trial Subscription Expired, Buy New License','flash_type'=> 'danger']);
            else return response()->json(['error'=> 'Trial Subscription Expired, Buy New License'], 200);
        }
        if(!$request->trial){
            $payment = Payment::create(['reference'=> uniqid(),'user_id'=> $user->id,
            'purpose'=> 'license','currency'=> $user->currency,'amount'=> $request->total]);
        }
        for($i = 1;$i <= $request->licenses;$i++){
            $licenses = License::create(['number' => $this->getLicense(),
                'type' => $request->subscription ? 'pharmacy + analytics':'analytics',
                'user_id' => $user->id,'payment_id' => isset($payment) ? $payment->id : null,
                'duration_days' => $request->trial ? $subscription_trial_days : $request->period * 30,
                'free_sms' => $request->trial ? 0 : $request->free_sms,
                'start_at' => $request->trial ? now() : null,
                'warn_at' => $request->trial ? now()->addDays($subscription_trial_days)->subDays(2) : null,
                'expire_at' => $request->trial ? now()->addDays($subscription_trial_days) : null
            ]);
        }
        if($request->trial){
            return redirect()->route('subscription.show')->with(['flash_message'=> 'Now Assign the License to a Pharmacy','flash_type'=> 'success']);
        }else{
            $response = $this->initializePayment($payment);
            if(!$response || !$response->status)
            return redirect()->back()->with(['flash_message'=> 'Service Unavailable, Please Try Again Shortly','flash_type'=> 'danger']);
            else return redirect()->to($response->data->authorization_url);    
        } 
    }

    public function update(Request $request){
        $user = auth()->user();
        if($user->pharmacies->where('id',$request->pharmacy_id)->isEmpty()){
            return redirect()->back()->with(['flash_message'=> 'Pharmacy Unknown, Please Use Correct Details','flash_type'=> 'danger']);
        }
        $license = License::find($request->license_id);
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        $pharmacy->sms_credit += $license->free_sms;
        $pharmacy->save();
        if(Hash::check($request->password, $user->password)){
            $license->pharmacy_id = $request->pharmacy_id;
            $license->start_at = now();
            $license->warn_at = $license->duration_days < 30 ? now()->addDays($license->duration_days)->subDays(2) : now()->addDays($license->duration_days)->subWeek();
            $license->expire_at = now()->addDays($license->duration_days);
            $license->free_sms = 0;
            $license->save();
            return redirect()->route('subscription.show')->with(['flash_message'=> 'License Assigned To Pharmacy','flash_type'=> 'success']);
        }
        return redirect()->back()->with(['flash_message'=> 'Password Incorrect','flash_type'=> 'danger']);
    }

    public function sms_allocation(Request $request){
        $validator = Validator::make($request->all(), [
            'pharmacy_id' => 'required|numeric',
            'sms_id' => 'required|exists:sms_units,id',
            'units' => 'required',
        ]);
        if ($validator->fails()) {
            if(in_array('web',$request->route()->action['middleware']))
            return redirect()->back()->withErrors($validator)->withInput()->with(['flash_message'=> $validator->errors()->first(),'flash_type'=> 'danger']);
            else return response()->json(json_decode($validator->errors(), true));
        }
        $user = auth()->user();
        $sms = SmsUnit::find($request->sms_id);
        if(!$sms || $sms->user_id != $user->id){
            return redirect()->back()->with(['flash_message'=> 'Service Unavailable, Please Try Again Shortly','flash_type'=> 'danger']);
        }
        if($sms->available < $request->units){
            return redirect()->back()->with(['flash_message'=> 'Insufficient SMS units for allocation','flash_type'=> 'danger']);
        }
        Pharmacy::where('id',$request->pharmacy_id)->update(['sms_credit'=> $request->units]);
        $sms->available = $sms->available - $request->units;
        $sms->save();
        return redirect()->route('subscription.show')->with(['flash_message'=> 'SMS Units Allocated to Pharmacy','flash_type'=> 'success']);
    }

    public function sms_purchase(Request $request){
        // dd($request->all());
        $user = auth()->user();
        $sms_cost = Setting::where('name','sms_plan')->first()->items["price_$user->currency"];
        $payment = Payment::create(['reference'=> uniqid(),'user_id'=> $user->id,
            'purpose'=> 'sms','currency'=> $user->currency,'amount'=> $sms_cost * $request->sms_units]);
        // $response = $this->initializePayment($payment);
        // if(!$response || !$response->status)
        // return redirect()->back()->with(['flash_message'=> 'Service Unavailable, Please Try Again Shortly','flash_type'=> 'danger']);
        // else return redirect()->to($response->data->authorization_url);   
        SmsUnit::create(['user_id'=> $user->id,'units'=> $request->sms_units,
        'available'=> $request->sms_units,'payment_id'=> $payment->id,'status'=> true]);
        //available should be 0 until after purchase then change to same value as units
        return redirect()->route('subscription.show')->with(['flash_message'=> 'Now Allocate SMS to Your Pharmacies','flash_type'=> 'success']);
    }
    
    

}