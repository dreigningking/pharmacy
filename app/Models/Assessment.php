<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use App\Models\PatientVitals;
use App\Models\PatientSystemReview;
use App\Models\PatientFinalDiagnosis;
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
    protected $appends = ['summary','medical_counsel'];
    protected $casts = ['complaints'=> 'array'];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function getSummaryAttribute(){
        $assess = '';
        if($this->finalDiagnoses->isNotEmpty()){
            $assess .= $this->finalDiagnoses->sortByDesc('created_at')->first()->condition->description;
            if($this->finalDiagnoses->count() > 1) {
                $assess .= ' + '.$this->finalDiagnoses->count().' more'; 
            }
            $assess .= ' @ '.$this->finalDiagnoses->sortByDesc('created_at')->first()->created_at->format('l jS M h:i A');
        }
        
        return $assess; 
    }

    public function getStatusAttribute(){
        if($this->finalDiagnoses->isEmpty()){
            return 'Inconclusive';
        }elseif($this->finalDiagnoses->where('achieved','yes')->count() == $this->finalDiagnoses->count()){
            return 'Completed';
        }else{
            return 'Ongoing';
        }
    }

    public function getMedicalCounselAttribute(){
        $counsel = collect([]);
        foreach($this->finalDiagnoses as $diagnosis){
            if($diagnosis->medical_counsel)
            $counsel->push($diagnosis->condition->medical_counsel);
        }
        return $counsel;
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function vitals(){
        return $this->hasMany(PatientVitals::class);
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

    public function finalDiagnoses(){
        return $this->hasMany(PatientFinalDiagnosis::class);
    }

    public function patientLaboratoryResults(){
        return $this->hasMany(PatientLaboratoryResult::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }
    
}
