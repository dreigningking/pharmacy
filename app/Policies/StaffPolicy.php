<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Auth\Access\HandlesAuthorization;

class StaffPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Pharmacy $pharmacy)
    {
        $roles = Role::whereIn('name',['director','manager'])->get();
        if($pharmacy->staff->where('user_id',$user->id)->whereIn('role_id',$roles->pluck('id')->toArray())->isNotEmpty())
        return true;
    }

    public function create(User $user)
    {
        $roles = Role::whereHas('permissions',function ($query){
            $query->where('name','staff');
        })->get();
        if($user->pharmacies->whereIn('pivot.role_id', $roles->pluck('id')->toArray())->isNotEmpty())
        return true;
    }

    public function update(User $user, Pharmacy $pharmacy)
    {
        if($pharmacy->staff->where('user_id',$user->id)->first()->role->permissions->where('name','staff')->isNotEmpty())
        return true;
    }

    public function delete(User $user, Pharmacy $pharmacy)
    {
        // $role_id = Role::where('name','director')->first()->id;
        if($pharmacy->staff->where('user_id',$user->id)->first()->role->permissions->where('name','staff')->isNotEmpty())
        return true;
    }

    public function restore(User $user, Pharmacy $pharmacy)
    {
        //
    }

    public function forceDelete(User $user, Pharmacy $pharmacy)
    {
        //
    }
}
