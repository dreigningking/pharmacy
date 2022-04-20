<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Disease;
use App\Models\Drug;

class Medicine extends Model
{
   
    use HasFactory;
    protected $fillable = ['name','description','contraindications'];
    protected $casts = ['contraindications'=>'array'];

    public function diseases () {
        return $this->belongsToMany(Disease::class, 'medicine_reactions');
    }
    public function drugs () {
        return $this->belongsToMany(Drug::class, 'ingredients');
    }
}
