<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleDetail extends Model
{
    use HasFactory;
    
    protected $fillable = ['sale_id','inventory_id','batch','quantity','price','amount'];

    public function sale(){
        return $this->belongsTo(Sale::class);
    }

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }


}
