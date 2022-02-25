<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;

class PharmacyController extends Controller
{
   
    public function create(){
        $countries = Country::all();
        return view('main.newpharmacy.details',compact('countries'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:5000',
            'license' => 'required|file|max:5000',
            'name' => 'required|string',
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
        return 'ok';
        $user = Auth::user();
        $image = now().'.jpg';
        $license = now().'.jpg';
        $request->file('image')->storeAs('public/pharmacies/logos',$image);
        $request->file('license')->storeAs('public/pharmacies/licenses',$license);
        $pharmacy = Pharmacy::create(['']);
    }
}
