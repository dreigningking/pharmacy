<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientLaboratoryResult extends Model
{
    use HasFactory;

    protected $fillable = ['test_id','assessment_id','patient_id','result','comment'];

    public function test(){
        return $this->belongsTo(LaboratoryTest::class,'test_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function assessment(){
        return $this->belongsTo(Assessment::class);
    }

}
