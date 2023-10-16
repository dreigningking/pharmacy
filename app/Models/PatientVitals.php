<?php

namespace App\Models;

use App\Models\Vital;
use App\Models\Patient;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientVitals extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id','assessment_id','vital_id','value','comment'];

    public function vital(){
        return $this->belongsTo(Vital::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function assessment(){
        return $this->belongsTo(Assessment::class);
    }

}
