<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;
use App\Models\Medicine;


class Item extends Model
{
    use HasFactory;
    public function ingredients() {
        return $this->belongsToMany(Medicine::class, 'ingredients');
    }
}
