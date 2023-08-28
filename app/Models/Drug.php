<?php

namespace App\Models;

use App\Models\Batch;
use App\Models\Medicine;
use App\Models\Inventory;
use App\Models\DrugCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Drug extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','dosage_form','manufacturer'];
    protected $appends = ['category_name'];
    
    public function getCategoryNameAttribute(){
        return $this->category->name;
    }
    public function ingredients() {
        return $this->belongsToMany(Medicine::class, 'ingredients')->withPivot(['size']);
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

    public function category(){
        return $this->belongsTo(DrugCategory::class,'category_id')->withDefault();
    }

    

}

