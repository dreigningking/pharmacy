<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class MedicineRelationship extends Model
{
    use HasFactory;
    protected $fillable = ['medicine_a','medicine_b','reaction'];
    public function medicine_a(){
        return $this->belongsTo(Medicine::class,'medicine_a');
    }
    public function medicine_b(){
        return $this->belongsTo(Medicine::class,'medicine_b');
    }
}
