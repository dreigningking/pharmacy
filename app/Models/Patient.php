<?php

namespace App\Models;

use App\Models\Pharmacy;
use App\Models\Assessment;
use App\Models\Prescription;
use App\Observers\PatientObserver;
use App\Models\PatientFinalDiagnosis;
use App\Models\PatientMedicalHistory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientMedicationHistory;
use App\Models\PatientFamilySocialHistory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = ['pharmacy_id','name','email','mobile','gender','age_today','emr','address','genotype','bloodgroup'];
    
    protected $dates = ['dob'];

    protected $appends = ['age'];

    public static function boot(){
        parent::boot();
        parent::observe(new PatientObserver);
    }

    public function sluggable(): array
    {
        return [
            'emr' => [
                'source' => 'identity',
                'separator' => '_'
            ]
        ];
    }

    public function getIdentityAttribute(){
        dd($this->name);
        return $this->name[0].$this->name[-1].substr($this->mobile,-4);
    }

    public function getAgeAttribute(){
        return $this->age_today + $this->created_at->diffInYears(now());
    }

    public function getAssessmentSummaryAttribute(){
        $summary = [];
        $assess = '';
        $extra = '';
        foreach($this->assessments as $assessment){
            if($assessment->finalDiagnoses->isNotEmpty()){
                $assess .= $assessment->finalDiagnoses->sortByDesc('created_at')->first()->condition->description;
                if($assessment->finalDiagnoses->count() > 1) {
                    $assess .= ' + '.$assessment->finalDiagnoses->count().' more'; 
                }
                $assess .= ' @ '.$assessment->finalDiagnoses->sortByDesc('created_at')->first()->created_at->format('l jS M h:i A');
                $summary[]= $assess;
            }
        }
        return $summary; 
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }

    public function assessments(){
        return $this->hasMany(Assessment::class);
    }

    public function medicalHistory(){
        return $this->hasMany(PatientMedicalHistory::class);
    }

    public function activemedicalHistory(){
        return $this->hasMany(PatientMedicalHistory::class)->where('start','>',today())->where('end','<',today());
    }

    public function medicationHistory(){
        return $this->hasMany(PatientMedicationHistory::class);
    }

    public function activeMedicationHistory(){
        return $this->hasMany(PatientMedicationHistory::class)->where('start','<',today())->where('end','>',today());
    }

    public function familySocialHistory(){
        return $this->hasMany(PatientFamilySocialHistory::class);
    }

    public function diagnoses(){
        return $this->hasMany(PatientFinalDiagnosis::class);
    }
}
