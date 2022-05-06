<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
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

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Order $order)
    {
        $roles = $user->pharmacies->where('id',$order->pharmacy_id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','sales')->first()->roles->where("pivot.view",1)->pluck('id')->toArray();
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

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $roles = $user->pharmacies->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','sales')->first()->roles->where("pivot.new",1)->pluck('id')->toArray();
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
        // dd('ok');
        $roles = $user->pharmacies->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','sales')->first()->roles->where("pivot.list",1)->pluck('id')->toArray();
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

    public function update(User $user, Order $order)
    {
        $roles = $user->pharmacies->where('id',$order->pharmacy_id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','sales')->first()->roles->where("pivot.edit",1)->pluck('id')->toArray();
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

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Order $order)
    {
        $roles = $user->pharmacies->where('id',$order->pharmacy_id)->pluck('pivot.role_id')->toArray();
        $permitted_roles = Permission::where('name','sales')->first()->roles->where("pivot.remove",1)->pluck('id')->toArray();
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

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Order $order)
    {
        //
    }
}
