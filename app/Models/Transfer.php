<?php

namespace App\Models;

use App\Models\Pharmacy;
use App\Models\TransferDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfer extends Model
{
    use HasFactory;
    protected $fillable = ['reference','sending_user','from_pharmacy','to_pharmacy','total','info','sent_at','accepted_at','rejected_at'];
    protected $casts = ['send_at'=> 'datetime','accepted_at'=> 'datetime','rejected_at'=> 'datetime'];
    
    public static function boot(){
        parent::boot();
        parent::observe(new \App\Observers\TransferObserver);
    }

    public function sending_pharmacy(){
        return $this->belongsTo(Pharmacy::class,'from_pharmacy');
    }

    public function receiving_pharmacy(){
        return $this->belongsTo(Pharmacy::class,'to_pharmacy');
    }
    
    public function details(){
        return $this->hasMany(TransferDetail::class);
    }
}

