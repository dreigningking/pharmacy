<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class Disease extends Model
{
    use HasFactory;
    public function medicines () {
        return $this->belongsToMany(Medicine::class, 'medicine_reactions');
    }
}