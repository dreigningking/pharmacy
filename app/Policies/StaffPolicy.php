<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PharmacyUser;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class StaffPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, PharmacyUser $pharmacyUser)
    {
        $roles = $user->pharmacies->where('id',$pharmacyUser->pharmacy_id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','staff')->first()->roles->where("pivot.view",1)->pluck('id')->toArray();
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
        $roles = $user->pharmacies->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','staff')->first()->roles->where("pivot.new",1)->pluck('id')->toArray();
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

    public function list(User $user)
    {
        $roles = $user->pharmacies->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','staff')->first()->roles->where("pivot.list",1)->pluck('id')->toArray();
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

    public function update(User $user, PharmacyUser $pharmacyUser)
    {
        $roles = $user->pharmacies->where('id',$pharmacyUser->pharmacy_id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','staff')->first()->roles->where("pivot.edit",1)->pluck('id')->toArray();
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

    
    public function delete(User $user, PharmacyUser $pharmacyUser)
    {
        $roles = $user->pharmacies->where('id',$pharmacyUser->pharmacy_id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','staff')->first()->roles->where("pivot.remove",1)->pluck('id')->toArray();
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


    public function restore(User $user, PharmacyUser $pharmacyUser)
    {
        //
    }

    public function forceDelete(User $user, PharmacyUser $pharmacyUser)
    {
        //
    }
}
