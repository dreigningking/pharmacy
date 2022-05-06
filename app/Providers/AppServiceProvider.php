<?php

namespace App\Providers;

use App\Models\Pharmacy;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::if('usercan', function (Pharmacy $pharmacy,$action,$type = null ) {
            $user = Auth::user();
            if($user->pharmacies->where('id',$pharmacy->id)->isNotEmpty() && $pharmacy->staff->where('user_id',$user->id)->first()->role->permissions->where('name',$action)->isNotEmpty())
            return true;
            else return false;
        });
        Blade::if('rolecan', function ($action,$ability) {
            $user = Auth::user();
            $roles = $user->pharmacies->pluck('pivot.role_id')->toArray();
            $permitted_roles = Permission::where('name',$action)->first()->roles->where("pivot.$ability",1)->pluck('id')->toArray();
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
        });
    }
}