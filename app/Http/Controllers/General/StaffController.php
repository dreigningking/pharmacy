<?php

namespace App\Http\Controllers\General;

use App\Models\Role;
use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\InvitationNotification;

class StaffController extends Controller
{
    public function activities(){
        $user = Auth::user();
        return view('user.activities',compact('user'));
    }
    
    public function store(Request $request){
        // add staff should send an email to the person
        // dd($request->all());
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        foreach($request->email as $key => $email){
            // dd($request->input("name.$key"));
            if(!$user = User::where('email',$email)->first()){
                $user = User::create(['name'=> $request->input("name.$key"),'type'=> 'staff','email'=> $email,
                'password'=> Hash::make($email),'pharmacy_id'=> $pharmacy->id,
                'role_id'=> Role::where('name','pharmacy')->first()->id,
                'require_password_change'=> true,'country_id'=> $pharmacy->country_id,
                'state_id'=> $pharmacy->state_id,'city_id'=> $pharmacy->city_id]);
            }
            $user->permissions()->sync($request->input("permission.$key"));
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        // delete staff should send an email to the person
        // dd($request->all());
        $pharmacyUser = User::where('pharmacy_id',$request->pharmacy_id)->where('user_id',$request->user_id)->delete();
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        //
    }

}
