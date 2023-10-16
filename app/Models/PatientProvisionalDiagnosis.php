<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Condition;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientProvisionalDiagnosis extends Model
{
    use HasFactory;

    protected $fillable = ['assessment_id','patient_id','condition_id','laboratory_tests'];
    protected $casts = ['laboratory_tests'=> 'array'];

    public function condition(){
        return $this->belongsTo(Condition::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function assessment(){
        return $this->belongsTo(Assessment::class);
    }

}
