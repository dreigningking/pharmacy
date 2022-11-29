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
        Blade::if('usercan', function ($action,$ability) {
            $user = Auth::user();
            if($user->permissions->isNotEmpty()){
                return $user->hasPermability($action,$ability);
            }else{
                return $user->role->hasPermability($action,$ability);
            }
            
        });
    }
}