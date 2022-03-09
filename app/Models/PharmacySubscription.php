<?php

namespace App\Models;

use App\Models\Pharmacy;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PharmacySubscription extends Model
{
    use HasFactory,SoftDeletes;

    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }
}
