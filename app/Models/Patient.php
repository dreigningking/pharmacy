<?php

namespace App\Models;

use App\Models\Pharmacy;
use App\Models\Assessment;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['id','pharmacy_id','name','mobile','email','dob','gender','emr','address','country_id','state_id','city_id'];
    protected $dates = ['dob'];

    public function pharmacies(){
        return $this->hasMany(Pharmacy::class);
    }

    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }
    public function assessments(){
        return $this->hasMany(Assessment::class);
    }
}
