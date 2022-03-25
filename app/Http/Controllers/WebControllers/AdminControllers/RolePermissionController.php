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
        // dd(in_array(2,$roles->where('name', 'director')->first()->permissions->pluck('permission_id')->toArray()));
        // dd(in_array(2,$roles->where('name', 'director')->first()->permissions->pluck('id')->toArray()));
        return view('admin.roles',compact('roles','permissions'));
    }

    public function store(Request $request){
        $role = Role::find($request->role_id);
        $role->permissions()->sync($request->permissions);
        return redirect()->back();
    }
}
