<?php

namespace App\Http\Controllers\WebControllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return view('admin.settings',compact('settings'));
    }
    public function store(Request $request){
        foreach($request->except('_token') as $key => $value){
            Setting::where('name',$key)->update(['value'=> $value]);
        }
        return back();
    }

    public function admin(){
        $users = User::where('admin',true)->get();
        $roles = Role::where('type','admin')->get();
        return view('admin.users.list',compact('users','roles'));
    }

    public function admin_manage(Request $request){
        if($request->action == 'create')
        $advice = User::create(['name'=> $request->name,'type'=> 'admin','email'=> $request->email,'password'=> Hash::make($request->email),'role_id'=> $request->role_id,'require_password_change'=> true,'country_id'=> 1,'state_id'=> 1,'city_id'=> 1]);
        elseif($request->action == 'update')
        $advice = User::where('id',$request->user_id)->update(['name'=> $request->name,'email'=> $request->email,'role_id'=> $request->role_id]);
        else
        $advice = User::destroy($request->user_id);
        return back();
    }
}
