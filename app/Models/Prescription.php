<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Pharmacy;
use App\Models\Assessment;
use App\Models\PrescriptionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = ['pharmacy_id','assessment_id','patient_id','user_id','origin'];
    protected $appends = ['status'];

    public function getSummaryAttribute(){
        $summary = '';
        if($this->details->isNotEmpty()){
            foreach($this->details->sortByDesc('created_at') as $key => $detail){
                $summary .= $detail->drug->name.(!$key?', ':'');
                if($key > 1) {
                    $summary .= ' + '.$this->details->count().' more'; 
                    break;
                }
            }
        }
        return $summary; 
    }

    public function getAverageDurationAttribute(){
        return intval($this->details->avg('duration'));
    }

    public function getStatusAttribute(){
        if($this->sales->isEmpty()){
            return 'draft';
        }else{
            if($this->created_at->addDays($this->average_duration) > now()){
                return 'ongoing';
            }else{
                return 'completed';
            }
        }
    }

    public function details(){
        return $this->hasMany(PrescriptionDetail::class);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

    public function assessment(){
        return $this->belongsTo(Assessment::class);
    }

    public function diagnosis(){
        return $this->assessment->diagnosis;
    }
}
