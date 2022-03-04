<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

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
        return view('main.user.director.transactions',compact('user'));
    }

    public function store(Request $request)
    {
        //
    }

    public function staff(){
        $user = Auth::user();
        return view('main.user.director.staff.list',compact('user'));
    }

    public function newstaff($id){
        $user = Auth::user();
        return view('main.user.director.staff.create',compact('user'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}