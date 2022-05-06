<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MedicineRelationship;
use App\Models\Drug;

class Medicine extends Model
{
   
    use HasFactory;
    protected $fillable = ['name','curables','contraindications','side_effects'];
    protected $casts = ['curables'=> 'array','contraindications'=>'array','side_effects'=>'array'];

    public function drugs () {
        return $this->belongsToMany(Drug::class, 'ingredients');
    }
    public function medicine_a(){
        return $this->hasMany(MedicineRelationship::class,'medicine_a');
    }
    public function medicine_b(){
        return $this->hasMany(MedicineRelationship::class,'medicine_b');
    }
}
