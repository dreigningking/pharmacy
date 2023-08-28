<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pharmacy;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['invitations','invitation_submit']);

    }

    public function index(){
        $user = Auth::user();
        if($user->type == 'admin'){
            return redirect()->route('admin.dashboard');
        }elseif($user->pharmacy_id){
            return redirect()->route('pharmacy.dashboard',$user->pharmacy);
        }else{
            return redirect()->route('dashboard');
        }
    }

    public function dashboard(){
        $user = Auth::user();
        return view('user.dashboard',compact('user'));
    }
    
    public function invitations(Pharmacy $pharmacy,User $user){
        return view('pharmacy.invitations',compact('user','pharmacy'));
    }
    
    public function invitation_submit(Request $request){
        $user = User::find($request->user_id);
        $pharmacy = Pharmacy::find($request->pharmacy_id);
        $pharmacy->users()->updateExistingPivot($user->id, ['status'=>true]);
        return redirect()->route('pharmacy.dashboard',$pharmacy);
    }
    
  
    
}
