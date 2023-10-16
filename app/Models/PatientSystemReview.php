<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Assessment;
use App\Models\SystemReviewQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientSystemReview extends Model
{
    use HasFactory;

    protected $fillable = ['review_id','assessment_id','patient_id','comment'];

    public function review(){
        return $this->belongsTo(SystemReviewQuestion::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function assessment(){
        return $this->belongsTo(Assessment::class);
    }

}
