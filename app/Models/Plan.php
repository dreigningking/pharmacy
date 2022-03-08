<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $casts = ['features'=> 'array'];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
