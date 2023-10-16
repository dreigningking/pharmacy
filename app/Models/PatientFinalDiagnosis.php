<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Condition;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientFinalDiagnosis extends Model
{
    use HasFactory;

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
