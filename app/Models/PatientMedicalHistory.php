<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Condition;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientMedicationHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientMedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = ['condition_id','assessment_id','patient_id','start','end'];
    protected $dates = ['start','end'];
    
    public function medications(){
        return $this->hasMany(PatientMedicationHistory::class,'condition_id','condition_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function assessment(){
        return $this->belongsTo(Assessment::class);
    }

    public function condition(){
        return $this->belongsTo(Condition::class);
    }

}
