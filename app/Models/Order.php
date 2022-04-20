<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacy;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','orderable_id','orderable_type','amount'
    ];
    public function orderable(){
        return $this->morphTo();
    } 
    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }
}
