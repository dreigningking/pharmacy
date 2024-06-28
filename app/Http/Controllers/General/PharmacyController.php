<?php

namespace App\Http\Controllers\General;

use App\Models\Drug;
use App\Models\Plan;
use App\Models\Country;
use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PharmacyController extends Controller
{
   
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Pharmacy $pharmacy){
        // $this->authorize('view', $pharmacy);
        $drugs= '';
        $patients= '';
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

        ],[
            'image.max'=> 'The image must be less than 5mb'
        ]);
        if ($validator->fails()) {
            if(in_array('web',$request->route()->action['middleware']))
            return redirect()->back()->withErrors($validator)->withInput();
            else return response()->json(json_decode($validator->errors(), true));
        }
        
        $user = Auth::user();
        $image = time().'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/pharmacies/logos',$image);
        $pharmacy = Pharmacy::create(['owner_id'=> $user->id,'name'=> $request->name,'description'=> $request->description,
                        'email'=> $request->email,'mobile'=> $request->mobile,'image'=> $image, 
                        'type'=> $request->type,'country_id'=> $request->country_id,'state_id'=>$request->state_id,
                        'city_id'=> $request->city_id,'address'=> $request->address]);
        $plan = Plan::where('name','pharmacy_subscription')->first();
        return redirect()->route('subscription.create');
    }

    public function settings(Pharmacy $pharmacy){
        $countries = Country::all();
        $permissions = Permission::where('admin',false)->get();
        // dd($pharmacy->activeLicense);
        return view('pharmacy.settings',compact('pharmacy','countries','permissions'));
    }

    public function update(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'pharmacy_id' => 'required|numeric',
            'image' => 'nullable|image|max:5000',
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'address' => 'required|string'

        ],[
            'image.max'=> 'The image must be less than 5mb'
        ]);
        if ($validator->fails()) {
            if(in_array('web',$request->route()->action['middleware']))
            return redirect()->back()->withErrors($validator)->withInput();
            else return response()->json(json_decode($validator->errors(), true));
        }
        $user = auth()->user();
        $pharmacy = Pharmacy::where('id',$request->pharmacy_id)->where('owner_id',$user->id)->first();
        if(!$pharmacy){
            if(in_array('web',$request->route()->action['middleware']))
            return redirect()->back()->with(['flash_message'=> 'Unknown Pharmacy','flash_type'=> 'danger']);
            else return response()->json(['message'=> 'Unknown Pharmacy'],400); 
        }
        if($request->hasFile('image')){
            if($pharmacy->image) Storage::delete('public/pharmacies/logos',$pharmacy->image);
            $image = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/pharmacies/logos',$image);
            $pharmacy->image = $image;
        }
        $pharmacy->name = $request->name;
        $pharmacy->description = $request->description;
        $pharmacy->type = $request->type;
        $pharmacy->email = $request->email;
        $pharmacy->mobile = $request->mobile;
        $pharmacy->country_id = $request->country_id;
        $pharmacy->state_id = $request->state_id;
        $pharmacy->city_id = $request->city_id;
        $pharmacy->address = $request->address;
        $pharmacy->save();
        return redirect()->back()->with(['flash_message'=> 'Details of Pharmacy have been Updated','flash_type'=> 'success']);
    }

    public function destroy(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'pharmacy_id' => 'required',
        ]);
        if ($validator->fails()) {
            if(in_array('web',$request->route()->action['middleware']))
            return redirect()->back()->withErrors($validator)->withInput()->with(['flash_message'=> 'Something is wrong','flash_type'=> 'danger']);
            else return response()->json(json_decode($validator->errors(), true));
        }
        $user = auth()->user();
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        if($pharmacy->owner_id != $user->id || !Hash::check(trim($request->password),$user->password)){
            return redirect()->back()->with(['flash_message'=> 'Something is Wrong! Could Not Delete Pharmacy','flash_type'=> 'danger']);
        }
        $pharmacy->delete();
        return redirect()->route('dashboard');
    }

    public function others(Pharmacy $pharmacy,Request $request){
        // dd($request->all());
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        foreach($request->except(['_token','pharmacy_id']) as $key => $item){
            if(Str::startsWith($key,'notify_')){
                // dd($item);
                $pharmacy[$key] = $item;
            }else{
                $pharmacy[$key] = $item;
            }
            
        }
        $pharmacy->save();
        return redirect()->back();
    }


}