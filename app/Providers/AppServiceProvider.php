<?php

namespace App\Providers;

use App\Models\Pharmacy;
use App\Models\Permission;
use Ixudra\Curl\Facades\Curl;
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
            /** @var \App\Models\User $user **/
            $user = Auth::user();
            if($user->permissions->isNotEmpty()){
                return $user->hasPermability($action,$ability);
            }else{
                return $user->role->hasPermability($action,$ability);
            }
            
        });
        // if(!session('geo_locale')){
        //     $ip = request()->ip() == '::1'|| request()->ip() == '127.0.0.1'? '197.211.58.12' : request()->ip();
        //     $result = Curl::to('http://www.geoplugin.net/php.gp?ip='.$ip)->get();
        //     $location =  unserialize($result);
        //     if($location && $location['geoplugin_region'] && $location['geoplugin_countryCode'] == 'ng'){
        //         session(['currency_code'=> 'NGN']);
        //         session(['currency_symbol'=> '₦' ]);
        //     }
                
        //     else {
        //         session(['currency_code'=> 'USD']);
        //         session(['currency_symbol'=> '$' ]);
        //     }
        // }
    }
}