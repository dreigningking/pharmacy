<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;
use App\Models\Medicine;


class Item extends Model
{
    use HasFactory;

    public function ingredients() {
        return $this->belongsToMany(Medicine::class, 'ingredients');
    }

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }

    public function pharmacyInventory($pharmacy_id){
        return $this->inventories->where('pharmacy_id',$pharmacy_id)->first();
    }

}