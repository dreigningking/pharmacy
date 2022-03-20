<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Pharmacy;
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
            Storage::delete($study->image);
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
    
    public function activities(){
        $user = Auth::user();
        return view('user.activities',compact('user'));
    }

    public function suppliers(){
        $user = Auth::user();
        return view('user.suppliers',compact('user'));
    }

    public function subscription(){
        //payments i've made
        $user = Auth::user();
        return view('user.subscription',compact('user'));
    }
    public function transactions(){
        //all pharmacies transactions
        $user = Auth::user();
        $transactions = collect([]);
        foreach($user->pharmacies as $pharmacy){
            $transactions = $transactions->merge($pharmacy->sales);
        }
        dd($transactions);
        return view('user.transactions',compact('user'));
    }

    public function store(Request $request){
        //
    }

    public function staff(){
        $user = Auth::user();
        $roles = Role::where('name','!=','admin')->get();
        // dd($roles->all());
        return view('user.staff',compact('user','roles'));
    }

    public function savestaff(Request $request){
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        $role = Role::where('id',$request->role_id)->first();
        $user = User::updateOrCreate(['email'=> $request->email],['name'=> $request->name,'password'=> Hash::make($request->email),'country_id'=> $pharmacy->country_id,'state_id'=> $pharmacy->state_id,'city_id'=> $pharmacy->city_id]);
        $pharmacy->users()->attach($user->id,['role_id'=> $role->id,'status'=> false]);
        $user->notify(new InvitationNotification($pharmacy,$role->name));
        return redirect()->back();
    }

   

    public function update(Request $request, $id)
    {
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        $role = Role::where('id',$request->role_id)->first();
        $user = User::updateOrCreate(['email'=> $request->email],['name'=> $request->name,'password'=> Hash::make($request->email),'country_id'=> $pharmacy->country_id,'state_id'=> $pharmacy->state_id,'city_id'=> $pharmacy->city_id]);
        $pharmacy->users()->attach($user->id,['role_id'=> $role->id,'status'=> false]);
        $user->notify(new InvitationNotification($pharmacy,$role->name));
        return redirect()->back();
    }

    public function destroystaff(Request $request)
    {
        // dd($request->all());
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        $user = User::find($request->user_id);
        if($pharmacy->users->count() > 1){
            $pharmacy->users()->detach($user->id);
            $user->delete();
        }
        return redirect()->back();
    }

 
}
