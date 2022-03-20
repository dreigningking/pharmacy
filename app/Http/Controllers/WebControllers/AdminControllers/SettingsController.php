<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return view('admin.settings',compact('settings'));
    }
}
