<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacy;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['id','pharmacy_id','name','mobile','email','dob','gender','emr','address','country_id','state_id','city_id'];
    protected $dates = ['dob'];
    public function pharmacies(){
        return $this->hasMany(Pharmacy::class);
    }
}
