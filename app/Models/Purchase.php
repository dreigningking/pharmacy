<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacy;
use App\Models\Supplier;
use App\Models\PurchaseDetail;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['pharmacy_id','supplier_id','invoice_number','total','info'];

    public static function boot(){
        parent::boot();
        parent::observe(new \App\Observers\PurchaseObserver);
    }

    public function details(){
        return $this->hasMany(PurchaseDetail::class);
    }
    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
