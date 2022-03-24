<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Ingredient;
use App\Models\Medicine;
use App\Models\Pharmacy;


class Item extends Model
{
    use HasFactory;
    public function ingredients() {
        return $this->belongsToMany(Medicine::class, 'ingredients');
    }
    public function pharmacies() {
        return $this->belongsTo(Pharmacy::class, 'ingredients');
    }
}
