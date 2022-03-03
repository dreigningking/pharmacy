<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function workspaces(){
        $user = Auth::user();
        return view('main.user.workspaces',compact('user'));
    }
    public function invitations(){
        $user = Auth::user();
        return view('main.user.invitations',compact('user'));
    }
  
    
}
