<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Disease;
use App\Models\Item;

class Medicine extends Model
{
   
    use HasFactory;
    protected $fillable = ['name','description','contraindications'];
    protected $casts = ['contraindications'=>'array'];

    public function diseases () {
        return $this->belongsToMany(Disease::class, 'medicine_reactions');
    }
    public function items () {
        return $this->belongsToMany(Item::class, 'ingredients');
    }
}
