<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Country;

class Pharmacy extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','email','mobile','image','license','type','country_id','state_id','city_id'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'pharmacy_users');
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
}