<?php

namespace App\Models;

use App\Models\Drug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DrugCategory extends Model
{
    use HasFactory;

    public function drugs(){
        return $this->hasMany(Drug::class);
    }
}
