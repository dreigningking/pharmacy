<?php

namespace App\Http\Controllers\General;

use App\Models\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Notifications\InvitationNotification;

class UserController extends Controller
{
    
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile',compact('user'));
    }
    
    public function profile_update(Request $request){
        $user = Auth::user();
        if($request->filled('name')) $user->name = $request->name;
        if($request->filled('name')) $user->name = $request->name;
        if($request->filled('mobile')) $user->mobile = $request->mobile;
        if($request->filled('state_id')) $user->state_id = $request->state_id;
        if($request->filled('city_id')) $user->city_id = $request->city_id;
        if ($request->hasfile('image')) {
            Storage::delete($user->image);
            $image = time().'.jpg';
            $request->file('image')->storeAs('public/users/photo',$image);
            $user->image = $image;
        }
        $user->save();
        return redirect()->back();
    }

    public function security(){
        $user = Auth::user();
        return view('user.security',compact('user'));
    }

    public function password_update(Request $request){
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required|string',
            'password' => 'required','string','confirmed'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                        // ->with(['flash_type' => 'danger','flash_msg'=>'Something went wrong']);
        }
        if(Hash::check($request->oldpassword, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back();
            // return redirect()->back()->with(['flash_type' => 'success','flash_msg'=>'Password changed successfully']); //with success
        }
        else return redirect()->back()->withErrors(['oldpassword' => 'Your old password is wrong'])->with(['flash_type' => 'danger','flash_msg'=>'Something went wrong']);

    }

    public function setting(){
        $user = Auth::user();
        return view('user.setting',compact('user'));
    }

    public function report(){
        //all pharmacies transactions
        // $this->authorize('list', Order::class);
        $user = Auth::user();
        //get orders of all users pharmacies
        return view('user.report',compact('user'));
    }

}
