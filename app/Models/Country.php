<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Country extends Model
{
    use HasFactory;

    protected $fillable = ['iso_code','name','dialing_code','flag','currency_name','currency_iso','currency_symbol'];
    
    public static function boot(){
        parent::boot();
        parent::observe(new \App\Observers\CountryObserver);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
    public function states(){
        return $this->hasMany(State::class);
    }
    public function cities(){
        return $this->hasManyThrough(City::class, State::class);
    }
}
