<?php

namespace App\Http\Controllers\GeneralControllers;

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
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        $user = User::create(['email'=> $request->email,'name'=> $request->name,
        'password'=> Hash::make($request->email),'country_id'=> $pharmacy->country_id,
        'pharmacy_id'=> $pharmacy->id,'role_id'=> $request->role_id,'state_id'=> $pharmacy->state_id,
        'city_id'=> $pharmacy->city_id,'require_password_change'=> true]);
        $user->notify(new InvitationNotification($pharmacy));
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        // dd($request->all());
        $pharmacyUser = User::where('pharmacy_id',$request->pharmacy_id)->where('user_id',$request->user_id)->delete();
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        //
    }

}
