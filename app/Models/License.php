<?php

namespace App\Models;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class License extends Model
{
    use HasFactory,SoftDeletes;

    public function active(){
        return $this->start_at < now() && $this->expire_at > now();
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

}
