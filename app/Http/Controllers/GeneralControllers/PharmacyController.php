<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Country;
use App\Models\Role;
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

    public function subscription(Pharmacy $pharmacy){
        return view('main.pharmacy.subscription',compact('pharmacy'));
    }

    public function create(){
        $countries = Country::all();
        $user = Auth::user();
        return view('main.pharmacy.create',compact('countries'));
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
                        'type'=> $request->type,'country_id'=> $request->country_id,'state_id'=>$request->state_id,'city_id'=> $request->city_id]);
        $role_id = $role_id = Role::where('name','director')->first()->id;
        $pharmacy->users()->attach($user->id,['role_id'=> $role_id,'status'=> true]);
        return redirect()->route('pharmacy.subscription',$pharmacy);
    }

    public function permission(Pharmacy $pharmacy){
        $roles = Role::all();
        // dd($roles);
        return view ('main.pharmacy.permissions', compact('pharmacy','roles'));
    }
    
    public function transactions(Pharmacy $pharmacy){
        return view('main.pharmacy.transactions',compact('pharmacy'));
    }

    public function staff(Pharmacy $pharmacy){
        return view('main.pharmacy.staff.list',compact('pharmacy'));
    }

    public function newstaff(Pharmacy $pharmacy){
        return view('main.pharmacy.staff.create',compact('pharmacy'));
    }
    public function inventory(Pharmacy $pharmacy){
        return view('main.pharmacy.inventory',compact('pharmacy'));
    }
    public function shelf(Pharmacy $pharmacy){
        return view('main.pharmacy.shelf',compact('pharmacy'));
    }
    public function settings(Pharmacy $pharmacy){
        return view('main.pharmacy.settings',compact('pharmacy'));
    }
    public function saveSettings(Pharmacy $pharmacy){
        return redirect()->back();
    }
    public function supply(Pharmacy $pharmacy){
        return view('main.pharmacy.supply',compact('pharmacy'));
    }
}