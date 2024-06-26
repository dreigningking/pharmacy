<?php

namespace App\Models;

use App\Models\Drug;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientMedicationHistory extends Model
{
    use HasFactory;

    protected $fillable = ['drug_id','patient_id','assessment_id','condition_id','start','end','effective'];

    protected $casts = ['start'=> 'datetime','end'=> 'datetime'];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function assessment(){
        return $this->belongsTo(Assessment::class);
    }

    public function drug(){
        return $this->belongsTo(Drug::class);
    }

    public function getIngredientsAttribute(){
        $apis = collect([]);
        foreach ($this->drug->ingredients as $key => $ingredient) {
            $apis->push($ingredient);
        }
        return $apis;
    }

}
