<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolePermissionController extends Controller
{
    public function index(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.roles',compact('roles','permissions'));
    }
}
