<?php

namespace App\Policies;

use App\Models\Pharmacy;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PharmacyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }
 
    public function view(User $user, Pharmacy $pharmacy)
    {
        $roles = $user->pharmacies->where('id',$pharmacy->id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','pharmacy')->first()->roles->where("pivot.view",1)->pluck('id')->toArray();
        $checker = false;
        foreach($permitted_roles as $permitted){
            if(in_array($permitted,$roles)){
                $checker = true;
            }
        }
        if($checker){
            return true;
        }else{
            return false;
        }   
    }

    public function create(User $user)
    {
        //
    }

    
    public function update(User $user, Pharmacy $pharmacy)
    {
        $roles = $user->pharmacies->where('id',$pharmacy->id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','pharmacy')->first()->roles->where("pivot.edit",1)->pluck('id')->toArray();
        $checker = false;
        foreach($permitted_roles as $permitted){
            if(in_array($permitted,$roles)){
                $checker = true;
            }
        }
        if($checker){
            return true;
        }else{
            return false;
        }   
    }

    public function delete(User $user, Pharmacy $pharmacy)
    {
        $roles = $user->pharmacies->where('id',$pharmacy->id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','pharmacy')->first()->roles->where("pivot.remove",1)->pluck('id')->toArray();
        $checker = false;
        foreach($permitted_roles as $permitted){
            if(in_array($permitted,$roles)){
                $checker = true;
            }
        }
        if($checker){
            return true;
        }else{
            return false;
        }   
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
