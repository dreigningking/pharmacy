<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\Payment;
use App\Models\Patient;
use App\Models\Drug;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $pharmacies = Pharmacy::all();
        $patients = Patient::all();
        $drugs = Drug::all();
        $payments = Payment::all();
        return view('admin.dashboard',compact('user','pharmacies','patients','drugs','payments'));
    }
    public function users(){
        $users = User::where('admin',true)->get();
        return view('admin.users.list',compact('users'));
    }
    public function createuser(){
        return view('admin.users.create');
    }
}
