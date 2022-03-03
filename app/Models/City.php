<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name','state_id'];

    public static function boot(){
        parent::boot();
        parent::observe(new \App\Observers\CityObserver);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
}