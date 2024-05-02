<?php

namespace App\Models;

use App\Models\Drug;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrescriptionDetail extends Model
{
    use HasFactory;
    protected $fillable = ['prescription_id','drug_id','quantity_per_dose','frequency','duration','medication_advise'];
    protected $with = ['drug'];

    public function prescription(){
        return $this->belongsTo(Prescription::class);
    }

    public function drug(){
        return $this->belongsTo(Drug::class);
    }

    public function getNameAttribute(){
        return $this->drug->name;
    }

    public function getQuantityAttribute(){
        return $this->quantity_per_dose * $this->frequency * $this->duration;
    }

    public function getInventoryAttribute(){
        return $this->prescription->pharmacy->inventories->firstWhere('drug_id',$this->drug_id);
    }

    
    
}
