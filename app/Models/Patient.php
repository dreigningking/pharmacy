<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacy;

class Patient extends Model
{
    use HasFactory;
    protected $dates = ['dob'];
    public function pharmacies(){
        return $this->hasMany(Pharmacy::class);
    }
}
