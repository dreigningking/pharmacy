<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class Pharmacy extends Model
{
    use HasFactory,Notifiable,SoftDeletes;
    
    protected $fillable = [
        'name','description','email','mobile','image','license','type','country_id','state_id','city_id'
    ];

    public static function boot(){
        parent::boot();
        parent::observe(new \App\Observers\PharmacyObserver);
    }

    public function users(){
        return $this->belongsToMany(User::class,'pharmacy_users');
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
}