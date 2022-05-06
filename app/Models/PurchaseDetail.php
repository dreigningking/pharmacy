<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;

class PurchaseDetail extends Model
{
    use HasFactory;
    
    protected $fillable = ['purchase_id','inventory_id','package_type','cost','quantity','amount','batch_no','expire_at','markup','markup_type','sellable_units'];
    protected $casts = ['expire_at'];

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
}
