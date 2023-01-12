<?php

namespace App\Models;

use App\Models\State;
use App\Observers\CityObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name','state_id'];

    public static function boot(){
        parent::boot();
        parent::observe(new CityObserver);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
}
