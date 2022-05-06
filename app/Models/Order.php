<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacy;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','orderable_id','orderable_type','amount'
    ];
    public function details(){
        return $this->hasMany(OrderDetail::class);
    }
    public function orderable(){
        return $this->morphTo();
    } 
    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }
}
