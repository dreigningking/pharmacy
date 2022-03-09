<?php

namespace App\Models;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
