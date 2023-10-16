<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;
    
    protected $fillable = ['assessment_id','patient_id','vital_id','value','comment'];
}
