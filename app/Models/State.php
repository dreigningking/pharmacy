<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Country;

class State extends Model
{
    use HasFactory;

    public static function boot(){
        parent::boot();
        parent::observe(new \App\Observers\StateObserver);
    }

    protected $fillable = ['name','code','country_id'];

    public function cities(){
        return $this->hasMany(City::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
