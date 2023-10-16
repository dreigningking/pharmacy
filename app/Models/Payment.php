<?php

namespace App\Models;

use App\Models\User;
use App\Models\License;
use App\Models\SmsUnit;
use App\Observers\PaymentObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference','user_id','purpose','currency','amount','method','status'
    ];

    public static function boot()
    {
        parent::boot();
        parent::observe(new PaymentObserver);
    }

    public function getRouteKeyName(){
        return 'reference';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function licenses(){
        return $this->hasMany(License::class);
    }

    public function sms(){
        return $this->hasOne(SmsUnit::class);
    }
}
