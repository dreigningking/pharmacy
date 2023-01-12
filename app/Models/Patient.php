<?php

namespace App\Models;

use App\Models\Pharmacy;
use App\Models\Assessment;
use App\Models\Prescription;
use App\Observers\PatientObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['id','pharmacy_id','name','mobile','email','age_today','gender','emr','address','genotype','bloodgroup'];
    protected $dates = ['dob'];
    protected $appends = ['age'];

    public static function boot(){
        parent::boot();
        parent::observe(new PatientObserver);
    }

    public function getAgeAttribute(){
        return $this->age_today + $this->created_at->diffInYears(now());
    }
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
