<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Drug;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Country;
use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PharmacyController extends Controller
{
   
    public function index(Pharmacy $pharmacy){
        // $this->authorize('view', $pharmacy);
        $drugs= Drug::all();
        $patients= Patient::all();
        return view('pharmacy.dashboard',compact('pharmacy', 'drugs', 'patients'));
    }


    public function create(){
        
        $countries = Country::all();
        $user = Auth::user();
        return view('pharmacy.create',compact('countries'));
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:5000',
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'address' => 'required|string',
            'agreement' => 'required|accepted',

        ]);
        if ($validator->fails()) {
            if(in_array('web',$request->route()->action['middleware']))
            return redirect()->back()->withErrors($validator)->withInput();
            else return response()->json(json_decode($validator->errors(), true));
        }
        
        $user = Auth::user();
        $image = time().'.jpg';
        $request->file('image')->storeAs('public/pharmacies/logos',$image);
        $pharmacy = Pharmacy::create(['name'=> $request->name,'description'=> $request->description,
                        'email'=> $request->email,'mobile'=> $request->mobile,'image'=> $image, 
                        'type'=> $request->type,'country_id'=> $request->country_id,'state_id'=>$request->state_id,
                        'city_id'=> $request->city_id,'address'=> $request->address]);
        $role_id = $role_id = Role::where('name','director')->first()->id;
        $pharmacy->users()->attach($user->id,['role_id'=> $role_id,'status'=> true]);
        $plan = Plan::where('name','pharmacy_subscription')->first();
        return redirect()->route('pharmacy.checkout',[$pharmacy,$plan]);
    }

    public function update(Request $request){

    }

    public function destroy(Request $request){
        
    }

    public function settings(Pharmacy $pharmacy){
        $countries = Country::all();
        return view('pharmacy.settings',compact('pharmacy','countries'));
    }
    public function saveSettings(Pharmacy $pharmacy){
        return redirect()->back();
    }

    public function notifications(Pharmacy $pharmacy){

    }

    
    
    
    
    
}