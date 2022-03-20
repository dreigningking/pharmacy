<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(){
        $payments = Payment::all();
        return view('admin.transactions',compact('payments'));
    }
}
