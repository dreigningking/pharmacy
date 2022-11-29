<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;
    protected $fillable = ['description','medical_counsel','status'];
    protected $casts = ['medical_counsel'=> 'array'];
}
