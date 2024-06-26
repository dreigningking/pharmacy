<?php

namespace App\Models;

use App\Models\Drug;
use App\Models\Batch;
use App\Models\Shelf;
use App\Models\Expired;
use App\Models\Pharmacy;
use App\Models\SaleDetail;
use App\Models\PurchaseDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory,SoftDeletes;
    
    // protected $appends = ['quantity'];

    protected $fillable = ['drug_id','pharmacy_id','name','shelf','category','unit_price','unit_cost','minimum_stocklevel','maximum_stocklevel','quantity','unit_of_sales','expiry_alert_weeks'];
    protected $with = ['batches'];

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

    public function Drug(){
        return $this->belongsTo(Drug::class);
    }
    
    // public function expired(){
    //     return $this->hasMany(Expired::class);
    // }
    public function purchases(){
        return $this->hasMany(PurchaseDetail::class);
    }

    
    public function batches(){
        return $this->hasMany(Batch::class);
    }

    public function scopeQuantities($query){
        return $query->where('quantity','>', 0);
    }

    public function saleDetails(){
        return $this->hasMany(SaleDetail::class)->with('sale.prescription.assessment.finalDiagnoses');
    }

    public function getAvailableAttribute(){
        return $this->batches->where('expire_at','>',today())->sum('quantity');
    }

    public function getSalesQuantityAttribute(){
        return $this->saleDetails->sum('quantity');
    }

    public function getSalesAmountAttribute(){
        return $this->saleDetails->sum('amount');
    }

    public function getStockStatusAttribute(){
        if($this->available > $this->maximum_stocklevel)
        return 'overstocked';
        if($this->available < $this->minimum_stocklevel)
        return 'understocked';
        if(!$this->available)
        return 'out of stock';
        return 'in stock';
    }



  
    
}
