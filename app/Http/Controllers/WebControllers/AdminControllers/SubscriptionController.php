<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribers(){
        return view('admin.subscription.subscribers');
    }

    public function licenses(){
        return view('admin.subscription.licenses');
    }

    public function sms(){
        return view('admin.subscription.sms');
    }

    public function transactions(){
        return view('admin.subscription.transactions');
    }
}
