<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use App\Models\PatientVitals;
use App\Models\PatientSystemReview;
use App\Models\PatientFinalDiagnosis;
use App\Models\PatientMedicalHistory;
use App\Models\PatientLaboratoryResult;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientMedicationHistory;
use App\Models\PatientFamilySocialHistory;
use App\Models\PatientProvisionalDiagnosis;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assessment extends Model
{
    use HasFactory;
    protected $fillable = ['pharmacy_id','user_id','patient_id','slug','complaints'];

    protected $casts = ['complaints'=> 'array'];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function vitals(){
        return $this->hasMany(PatientVitals::class);
    }

    public function patientMedicalHistory(){
        return $this->hasMany(PatientMedicalHistory::class);
    }

    public function patientMedicationHistory(){
        return $this->hasMany(PatientMedicationHistory::class);
    }

    public function familySocialHistory(){
        return $this->hasMany(PatientFamilySocialHistory::class);
    }

    public function systemReview(){
        return $this->hasMany(PatientSystemReview::class);
    }

    public function provisionalDiagnosis(){
        return $this->hasMany(PatientProvisionalDiagnosis::class);
    }

    public function finalDiagnosis(){
        return $this->hasMany(PatientFinalDiagnosis::class);
    }

    public function patientLaboratoryResults(){
        return $this->hasMany(PatientLaboratoryResult::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
