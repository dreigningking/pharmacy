<?php

namespace App\Models;

use App\Models\Drug;
use App\Models\Batch;
use App\Models\Shelf;
use App\Models\Expired;
use App\Models\Pharmacy;
use App\Models\PurchaseDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory,SoftDeletes;
    protected $appends = ['cost'];
    protected $fillable = ['drug_id','pharmacy_id','name','shelf','category','unit_price','unit_cost'];
    

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

    public function Drug(){
        return $this->belongsTo(Drug::class);
    }
    
    public function expired(){
        return $this->hasMany(Expired::class);
    }
    public function purchases(){
        return $this->hasMany(PurchaseDetail::class);
    }
    public function getCostAttribute(){
        return $this->purchases->avg('cost');
    }
    public function batches(){
        return $this->hasMany(Batch::class);
    }
    
}
