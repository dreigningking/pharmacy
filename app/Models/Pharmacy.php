<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\PharmacyUser;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Country;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacy extends Model
{
    use HasFactory,Notifiable;
    
    protected $fillable = [
        'name','description','email','mobile','image','license','type','country_id','state_id','city_id'
    ];

    public static function boot(){
        parent::boot();
        parent::observe(new \App\Observers\PharmacyObserver);
    }

    public function users(){
        return $this->belongsToMany(User::class,'pharmacy_users')->withPivot('role_id','status');
    }
    public function staff(){
        return $this->hasMany(PharmacyUser::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
    public function sales(){
        return $this->hasMany(Sale::class);
    }

}