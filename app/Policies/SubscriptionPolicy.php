<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permission;
use App\Models\Subscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
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

    public function view(User $user, Subscription $subscription)
    {
        $roles = $user->pharmacies->where('id',$subscription->pharmacy_id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','subscription')->first()->roles->where("pivot.view",1)->pluck('id')->toArray();
        $checker = false;
        foreach($permitted_roles as $permitted){
            if(in_array($permitted,$roles) && $user->id == $subscription->user_id){
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
        $permitted_roles = Permission::where('name','subscription')->first()->roles->where("pivot.new",1)->pluck('id')->toArray();
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
        $permitted_roles = Permission::where('name','subscription')->first()->roles->where("pivot.list",1)->pluck('id')->toArray();
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

    public function update(User $user, Subscription $subscription)
    {
        $roles = $user->pharmacies->where('id',$subscription->pharmacy_id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','subscription')->first()->roles->where("pivot.edit",1)->pluck('id')->toArray();
        $checker = false;
        foreach($permitted_roles as $permitted){
            if(in_array($permitted,$roles) && $user->id == $subscription->user_id){
                $checker = true;
            }
        }
        if($checker){
            return true;
        }else{
            return false;
        }   
    }

    
    public function delete(User $user, Subscription $subscription)
    {
        $roles = $user->pharmacies->where('id',$subscription->pharmacy_id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','subscription')->first()->roles->where("pivot.remove",1)->pluck('id')->toArray();
        $checker = false;
        foreach($permitted_roles as $permitted){
            if(in_array($permitted,$roles) && $user->id == $subscription->user_id){
                $checker = true;
            }
        }
        if($checker){
            return true;
        }else{
            return false;
        }   
    }

    
    public function restore(User $user, Subscription $subscription)
    {
        //
    }

    
    public function forceDelete(User $user, Subscription $subscription)
    {
        //
    }
}
