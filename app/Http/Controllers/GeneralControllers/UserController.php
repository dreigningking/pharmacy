<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Models\Bank;
use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Country;
use App\Models\Pharmacy;
use App\Models\PharmacyUser;
use App\Models\Supplier;
use App\Models\Subscription;
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
    
    public function activities(){
        $user = Auth::user();
        return view('user.activities',compact('user'));
    }

    public function suppliers(){
        $user = Auth::user();
        $countries = Country::all();
        $banks = Bank::all();
        $suppliers = collect([]);
        // dd($user->pharmacies->first()->suppliers);
        foreach($user->pharmacies as $pharmacy){
            $suppliers = $suppliers->merge($pharmacy->suppliers);
        }
        return view('user.suppliers',compact('user','countries','suppliers','banks'));
    }

    public function supplier_save(Request $request){
        // dd($request->all());
        $user = User::find($request->user_id);
        // dd($request->all());
        $supplier = Supplier::updateOrCreate(['email'=> $request->email],['name'=> $request->name,'mobile'=> $request->mobile,
            'country_id'=> $request->country_id,'state_id'=> $request->state_id,'city_id'=> $request->city_id,
            'bank_id'=> $request->bank_id ?? null,'bank_account'=> $request->account_number ?? null]);
        
        $supplier->pharmacies()->sync($user->pharmacies->pluck('id')->toArray());
        if($request->ajax){
            return response()->json(['supplier'=> $supplier],200);
        }else{
            return redirect()->back();
        }
    }

    

    public function report(){
        //all pharmacies transactions
        // $this->authorize('list', Order::class);
        $user = Auth::user();
        //get orders of all users pharmacies
        return view('user.report',compact('user'));
    }
    

    public function staff(){
        $user = Auth::user();
        $roles = Role::where('type','!=','admin')->get();
        // dd($roles->all());
        return view('user.staff',compact('user','roles'));
    }

    public function savestaff(Request $request){
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        $user = User::create(['email'=> $request->email,'name'=> $request->name,
        'password'=> Hash::make($request->email),'country_id'=> $pharmacy->country_id,
        'pharmacy_id'=> $pharmacy->id,'role_id'=> $request->role_id,'state_id'=> $pharmacy->state_id,
        'city_id'=> $pharmacy->city_id,'require_password_change'=> true]);
        $user->notify(new InvitationNotification($pharmacy));
        return redirect()->back();
    }

   

    

    public function destroystaff(Request $request)
    {
        // dd($request->all());
        $pharmacyUser = User::where('pharmacy_id',$request->pharmacy_id)->where('user_id',$request->user_id)->delete();
        return redirect()->back();
    }

 
}
