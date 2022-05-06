<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolePermissionController extends Controller
{
    public function index(){
        $roles = Role::with('permissions')->get();
        $permissions = Permission::with('roles')->get();
        return view('admin.roles',compact('roles','permissions'));
    }

    public function store(Request $request){
        $role = Role::where('name',$request->role)->first();
        $role->permissions()->detach();
        foreach($request->permissions as $id => $abilities){
            $role->permissions()->attach([$id => 
            ['list' => in_array('list',$abilities) ?? false,'view' => in_array('view',$abilities) ?? false,'edit' => in_array('edit',$abilities) ?? false,
            'new' => in_array('new',$abilities) ?? false,'remove' => in_array('remove',$abilities) ?? false]]);
        }
        return redirect()->back();
    }
}
