<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\User;
use App\Models\License;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','payment_id','type','trial','licenses','status'];
    protected $dates = ['start','end','warn'];

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function licenses(){
        return $this->hasMany(License::class);
    }

}
