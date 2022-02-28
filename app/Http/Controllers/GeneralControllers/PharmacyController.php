<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Country;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PharmacyController extends Controller
{
   
    public function index(Pharmacy $pharmacy){
        return view('main.pharmacy.dashboard',compact('pharmacy'));
    }

    public function create(){
        $countries = Country::all();
        $user = Auth::user();
        return view('main.director.pharmacy.create',compact('countries'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:5000',
            'license' => 'required|file|max:5000',
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
        $license = time().'.jpg';
        $request->file('image')->storeAs('public/pharmacies/logos',$image);
        $request->file('license')->storeAs('public/pharmacies/licenses',$license);
        $pharmacy = Pharmacy::create(['name'=> $request->name,'description'=> $request->description,
                        'email'=> $request->email,'mobile'=> $request->mobile,'image'=> $image,'license'=> $license,
                        'type'=> $request->type,'country_id'=> $request->country_id,'state_id'=>$request->state_id,'city_id'=> $request->city_id]);
        $pharmacy->users()->attach($user->id);
        return redirect()->route('subscription',$pharmacy);
    }
    public function workspaces(){
        $user = Auth::user();
        return view('main.pharmacy.workspaces',compact('user'));
    }
}