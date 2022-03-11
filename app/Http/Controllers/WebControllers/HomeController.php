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

    public function index()
    {
        $user = Auth::user();
        return view('main.user.dashboard',compact('user'));
    }
    
    public function workspaces(){
        $user = Auth::user();
        return view('main.user.workspaces',compact('user'));
    }
    public function invitations(Pharmacy $pharmacy,User $user){
        return view('main.pharmacy.invitations',compact('user','pharmacy'));
    }
    public function invitation_submit(Request $request){
        
    }
    
  
    
}
