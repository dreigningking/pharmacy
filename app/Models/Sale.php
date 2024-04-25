<?php

namespace App\Models;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = ['pharmacy_id','prescription_id','patient_id','user_id','status'];

    public function getSummaryAttribute(){
        $summary = '';
        foreach($this->details->sortByDesc('created_at') as $key => $detail){
            $summary .= $detail->inventory->name.(!$key?', ':'');
            if($key > 1) {
                $summary .= ' + '.$this->details->count().' more'; 
                break;
            }
        }
        return $summary; 
    }

    public function getTypeAttribute(){
        $type = 'nondrug';
        foreach($this->details->sortByDesc('created_at') as $key => $detail){
            if($detail->inventory->drug_id){
                $type = 'drug';
                break;
            }
        }
        return $type; 
    }


    public function getTotalAttribute(){
        return $this->details->sum('amount');
    }

    public function details(){
        return $this->hasMany(SaleDetail::class);
    }

    public function prescription(){
        return $this->belongsTo(Prescription::class);
    }
}
