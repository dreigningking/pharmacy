<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacy;

class Transfer extends Model
{
    use HasFactory;
    protected $fillable = ['sending_user','from_pharmacy','to_pharmacy','total','info'];

    public function sending_pharmacy(){
        return $this->belongsTo(Pharmacy::class,'from_pharmacy');
    }
    public function receiving_pharmacy(){
        return $this->belongsTo(Pharmacy::class,'to_pharmacy');
    }
}
