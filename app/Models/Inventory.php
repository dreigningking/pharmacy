<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
    
}
