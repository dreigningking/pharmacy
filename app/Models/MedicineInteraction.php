<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class MedicineInteraction extends Model
{
    use HasFactory;
    protected $fillable = ['medicine_a','medicine_b','remark','mechanism'];
    
    public function base(){
        return $this->belongsTo(Medicine::class,'medicine_a');
    }
    public function target(){
        return $this->belongsTo(Medicine::class,'medicine_b');
    }
}
