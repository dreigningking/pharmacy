<?php

namespace App\Models;

use App\Models\Drug;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;
           
    protected $fillable = ['drug_id','pharmacy_id','name','shelf_id','batch_no','quantity','unit_price','unit_cost','amount','expire_at'];

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

    public function Drug(){
        return $this->belongsTo(Drug::class);
    }
    
}
