<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;
// use App\Models\Ingredient;
use App\Models\Medicine;


class Drug extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','administation','manufacturer'];
    protected $casts = ['contraindications'=> 'array','side_effects'=>'array'];
            
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

