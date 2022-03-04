<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Disease;

class Medicine extends Model
{
   
    use HasFactory;
    protected $casts = ['contraindications'=>'array'];

    public function diseases () {
        return $this->belongsToMany(Disease::class, 'medicine_reactions');
    }
}
