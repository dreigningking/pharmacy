<?php

namespace App\Http\Controllers\GeneralControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function profile()
    {
        $user = Auth::user();
        return view('main.user.profile',compact('user'));
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
        return view('main.user.security',compact('user'));
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
        return view('main.user.setting',compact('user'));
    }
    
    public function activities(){
        $user = Auth::user();
        return view('main.user.activities',compact('user'));
    }

    public function create()
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
