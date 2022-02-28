<?php
namespace App\Http\Traits;

use Browser;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Cache;

trait GeoLocationTrait
{
    protected function getLocation(){
        $userLocation = Cache::rememberForever(request()->ip(), function () {
            // $place = Curl::to('https://ipapi.co/json')
            $place = Curl::to('https://api.ipdata.co/')
                    ->withData( array( 'api-key' => config('services.ipdata') ) )
                    // ->withData( array( 'key' => config('services.ip_api') ) )
                    ->asJsonResponse()
                    ->get();
            if(isset($place->country_code))
                $temp = [
                            'iso_code'=> $place->country_code,
                            'country'=> $place->country_name,
                            'state'=> $place->region ,
                            'state_code'=> $place->region_code ,
                            'city'=> $place->city,
                            'dialing_code'=> $place->calling_code,
                            'flag'=>'https://ipdata.co/flags/'.strtolower($place->country_code).'.png',
                            'timezone'=> $place->time_zone->name,
                            'currency_name' => $place->currency->name,
                            'currency_iso' => $place->currency->code,
                            'currency_symbol' => $place->currency->symbol
                        ];
            else
                $temp = [
                            'iso_code'=> 'NG',
                            'country'=> 'Nigeria',
                            'state'=>'Lagos',
                            'state_code'=>'LA',
                            'city'=>'Lagos',
                            'flag'=>'https://ipdata.co/flags/ng.png',
                            'dialing_code'=> '+234',
                            'timezone'=> 'Africa/Lagos',
                            'currency_name' => 'Naira',
                            'currency_iso' => 'NGN',
                            'currency_symbol' => '₦'
                        ];
            $geo = $this->saveLocation($temp); 
            $userinfo = [
                'country_id'=> $geo['country']->id,
                'country_code'=> $temp['iso_code'],
                'country_name'=> $temp['country'],
                'state_id'=> $geo['state']->id,
                'state_name'=> $temp['state'],
                'city_id'=> $geo['city']->id,
                'city_name'=> $temp['city'],
                'timezone'=> $temp['timezone'],
                'dialing_code' => $temp['dialing_code'],
                'currency_name'=> $temp['currency_name'],
                'currency_iso'=> $temp['currency_iso'],
                'currency_symbol'=> $temp['currency_symbol'],
            ];
                    
            return $userinfo;
        });
        return $userLocation;
    }
    protected function saveLocation(Array $info){
        $country = Country::firstOrCreate(['iso_code'=> strtoupper($info['iso_code'])], 
                        [
                            'name'=> $info['country'],
                            'dialing_code'=> $info['dialing_code'],
                            'flag'=> 'https://ipdata.co/flags/'.$info['iso_code'].'.png',
                            'currency_name'=> $info['currency_name'],
                            'currency_iso'=> $info['currency_iso'],
                            'currency_symbol'=> $info['currency_symbol'],
                            
                        ]);
        $state = State::firstOrCreate(['country_id' => $country->id,'name'=> $info['state']]);
        $city = City::firstOrCreate(['state_id' => $state->id,'name'=> $info['city']]);
        return ['country'=> $country,'state'=> $state,'city'=>$city];
    }

}