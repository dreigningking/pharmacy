<?php

namespace App\Http\Controllers\WebControllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolePermissionController extends Controller
{
    public function index(){
        $roles = Role::with('permissions')->where('type','admin')->get();
        $permissions = Permission::with('roles')->get();
        return view('admin.roles.admin',compact('roles','permissions'));
    }

    public function store(Request $request){
        // dd($request->all());
        $role = Role::where('name',$request->role)->first();
        $role->permissions()->detach();
        foreach($request->permissions as $id => $abilities){
            // dd()
            $role->permissions()->attach([$id => 
            ['list' => in_array('list',$abilities),'view' => in_array('view',$abilities) ,'edit' => in_array('edit',$abilities) ,
            'new' => in_array('new',$abilities),'remove' => in_array('remove',$abilities) ]]);
        }
        return redirect()->back();
    }
}
