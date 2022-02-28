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
    public function index()
    {
        $user = Auth::user();
        if($user->role->name !='director')
        return redirect()->route('workspaces');
        if($user->role->name =='director' && $user->pharmacies->isNotEmpty())
        return $this->director();
        else return redirect()->route('setup');
    }
    public function director(){
        $user = Auth::user();
        return view('main.director.dashboard',compact('user'));
    }
    public function pharmacies(){
        $user = Auth::user();
        return view('main.director.pharmacy.list',compact('user'));
    }
}
