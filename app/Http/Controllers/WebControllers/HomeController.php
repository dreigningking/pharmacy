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
        if($user->role->name !='director')
        return redirect()->route('workspaces');
        if($user->role->name =='director' && $user->pharmacies->isNotEmpty())
        return view('main.dashboard.director');
        else return redirect()->route('setup');
    }
    public function dashboard(){
        // return view('main.dashboard.pharmacist');
    }
}
