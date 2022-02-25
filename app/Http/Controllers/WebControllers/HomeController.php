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
    public function director()
    {
        $user = Auth::user();
        if(!$user->role)
        return redirect()->route('setup');
        if($user->role->name !='director')
            return $this->dashboard();   
        else return view('main.dashboard.director');
    }
    public function dashboard(){
        return view('main.dashboard.pharmacist');
    }
}
