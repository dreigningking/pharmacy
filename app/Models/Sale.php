<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacy;
class Sale extends Model
{
    use HasFactory;
    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }
}
