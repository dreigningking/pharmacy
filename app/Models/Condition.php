<?php

namespace App\Models;

use App\Models\PatientFinalDiagnosis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Condition extends Model
{
    use HasFactory;
    protected $fillable = ['description','medical_counsel','status'];
    protected $casts = ['medical_counsel'=> 'array','treatmemt_outcome'=> 'array'];

    public function diagnoses(){
        return $this->hasMany(PatientFinalDiagnosis::class)->with('assessment.prescriptions.details');
    }
    // public function assessments(){
    //     return $this->hasManyThrough(Assessment::class, PatientFinalDiagnosis::class);
    // }

    public function patient(){
        return $this->assessment->patient;
    }
    
    public function hospital(){
        return $this->assessment->hospital;
    }
    public function treatment(){
        return $this->assessment->treatment;
    }
    public function medication(){
        return $this->assessment->medication;
    }
    public function surgery(){
        return $this->assessment->surgery;
    }
    public function laboratory(){
        return $this->assessment->laboratory;
    }
    public function imaging(){
        return $this->assessment->imaging;
    }
    public function procedure(){
        return $this->assessment->procedure;
    }
    public function rehabilitation(){
        return $this->assessment->rehabilitation;
    }
    public function education(){
        return $this->assessment->education;
    }
    public function support_group(){
        return $this->assessment->support_group;
    }
    public function other(){
        return $this->assessment->other;
    }
    public function status(){
        return $this->assessment->status;
    }    
    public function created_at(){
        return $this->assessment->created_at;
    }
    public function updated_at(){
        return $this->assessment->updated_at;
    }
    public function deleted_at(){
        return $this->assessment->deleted_at;
    }
    public function user(){
        return $this->assessment->user;
    }
    public function pharmacy(){
        return $this->assessment->pharmacy;
    }
    public function patient_id(){
        return $this->assessment->patient_id;
    }
    public function doctor_id(){
        return $this->assessment->doctor_id;
    }
    public function hospital_id(){
        return $this->assessment->hospital_id;
    }
    public function treatment_id(){
        return $this->assessment->treatment_id;
    }
    public function medication_id(){
        return $this->assessment->medication_id;
    }
    public function surgery_id(){
        return $this->assessment->surgery_id;
    }
    public function laboratory_id(){
        return $this->assessment->laboratory_id;
    }
    public function imaging_id(){
        return $this->assessment->imaging_id;
    }
    public function procedure_id(){
        return $this->assessment->procedure_id;
    }
    public function rehabilitation_id(){
        return $this->assessment->rehabilitation_id;
    }
    public function education_id(){
        return $this->assessment->education_id;
    }
    public function support_group_id(){
        return $this->assessment->support_group_id;
    }
    public function other_id(){
        return $this->assessment->other_id;
    }
    public function status_id(){
        return $this->assessment->status_id;
    }
    public function user_id(){
        return $this->assessment->user_id;
    }
 
    
}


