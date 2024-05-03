<?php

namespace App\Models;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class License extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['number','type','user_id','pharmacy_id','payment_id','duration_days','free_sms','start_at','warn_at','expire_at','status'];
    
    protected $dates = ['start_at','expire_at'];
    protected $casts = ['type'=> 'array'];
    
    public function active(){
        return $this->start_at < now() && $this->expire_at > now();
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }



}
