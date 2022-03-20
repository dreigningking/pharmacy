<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\Patient;
class TreatmentController extends Controller
{
    public function pharmacies(){
        $pharmacies = Pharmacy::all();
        return view('admin.pharmacies',compact('pharmacies'));
    }
    public function patients(){
        $patients = Patient::all();
        return view('admin.patients',compact('patients'));
    }
}
