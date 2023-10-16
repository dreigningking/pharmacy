<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Assessment;
use App\Models\FamilySocialQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientFamilySocialHistory extends Model
{
    use HasFactory;

    protected $fillable = ['question_id','patient_id','assessment_id','value','comment'];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function assessment(){
        return $this->belongsTo(Assessment::class);
    }

    public function question(){
        return $this->belongsTo(FamilySocialQuestion::class,'question_id');
    }
}
