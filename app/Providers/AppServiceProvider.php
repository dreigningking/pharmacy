<?php

namespace App\Providers;

use App\Models\Pharmacy;
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
        Blade::if('cando', function (Pharmacy $pharmacy,$action,$type = null ) {
            $user = Auth::user();
            if($user->pharmacies->where('id',$pharmacy->id)->isNotEmpty() && $pharmacy->staff->where('user_id',$user->id)->first()->role->permissions->where('name',$action)->isNotEmpty())
            return true;
            else return false;
        });
    }
}