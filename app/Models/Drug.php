<?php

namespace App\Models;

use App\Models\Batch;
use App\Models\Medicine;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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

    public function batches(){
        return $this->hasManyThrough(Batch::class,Inventory::class);
    }

    public function pharmacyInventory($pharmacy_id){
        return $this->inventories->where('pharmacy_id',$pharmacy_id)->first();
    }

}

