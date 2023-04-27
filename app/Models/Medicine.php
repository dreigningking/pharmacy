<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MedicineInteraction;
use App\Models\Drug;

class Medicine extends Model
{
   
    use HasFactory;
    protected $fillable = ['name','side_effects','contraindications',	'pregnancy_status',	'lactation_status',	'alternatives',	'medication_counsel'];
    protected $casts = ['alternatives'=> 'array','contraindications'=>'array','side_effects'=>'array','medication_counsel' => 'array','pregnancy_status'=> 'array','lactation_status'=> 'array'];

    public function drugs () {
        return $this->belongsToMany(Drug::class, 'ingredients');
    }
    public function getInteractionsAttribute(){
        return $this->medicine_a->count() + $this->medicine_b->count();
    }
    public function medicine_a(){
        return $this->hasMany(MedicineInteraction::class,'medicine_a');
    }
    public function medicine_b(){
        return $this->hasMany(MedicineInteraction::class,'medicine_b');
    }
}
