<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = ['expire_at','number','quantity','inventory_id'];
    protected $dates = ['expire_at'];
}
