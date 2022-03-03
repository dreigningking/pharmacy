<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->pharmacies->isEmpty())
            return redirect()->route('setup');
        return view('main.director.dashboard',compact('user'));
    }
    public function pharmacies(){
        $user = Auth::user();
        return view('main.director.pharmacy.list',compact('user'));
    }

    public function permission()
    {
        $roles = Role::all();
        // dd($roles);
        return view ('main.permissions', compact('roles'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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