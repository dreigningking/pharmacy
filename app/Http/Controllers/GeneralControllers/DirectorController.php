<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InvitationNotification;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function suppliers(){
        $user = Auth::user();
        return view('main.user.director.suppliers',compact('user'));
    }

    public function subscription(){
        //payments i've made
        $user = Auth::user();
        return view('main.user.director.subscription',compact('user'));
    }
    public function transactions(){
        //all pharmacies transactions
        $user = Auth::user();
        $transactions = collect([]);
        foreach($user->pharmacies as $pharmacy){
            $transactions = $transactions->merge($pharmacy->sales);
        }
        dd($transactions);
        return view('main.user.director.transactions',compact('user'));
    }

    public function store(Request $request){
        //
    }

    public function staff(){
        $user = Auth::user();
        $roles = Role::where('name','!=','admin')->get();
        return view('main.user.director.staff',compact('user','roles'));
    }

    public function savestaff(Request $request){
        // dd($request->all());
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        $role = Role::where('id',$request->role_id)->first();
        $user = User::updateOrCreate(['email'=> $request->email],['name'=> $request->name,'password'=> Hash::make($request->email),'country_id'=> $pharmacy->country_id,'state_id'=> $pharmacy->state_id,'city_id'=> $pharmacy->city_id]);
        $pharmacy->users()->attach($user->id,['role_id'=> $role->id,'status'=> false]);
        $user->notify(new InvitationNotification($pharmacy,$role->name));
        return redirect()->back();
    }

   

    public function update(Request $request, $id)
    {
        //
    }

    public function destroystaff(Request $request)
    {
        // dd($request->all());
        $pharmacy = Pharmacy::find($request->pharmacy_id);
       
        $user = User::find($request->user_id);
        $pharmacy->users()->detach($user->id);
        $user->delete();

        return redirect()->back();
    }
}