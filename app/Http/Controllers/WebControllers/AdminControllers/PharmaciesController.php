<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmaciesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $pharmacies = Pharmacy::all();
        // dd($pharmacies-x >first()->owner);
        return view('admin.pharmacy.list',compact('pharmacies'));
    }

    public function show(Pharmacy $pharmacy){
        return view('admin.pharmacy.view',compact('pharmacy'));
    }

    public function status(Pharmacy $pharmacy,Request $request){
        if($pharmacy->active)
            $pharmacy->active = 0;
        else $pharmacy->active = 1;
        $pharmacy->save();
        return redirect()->back();
    }
}
