<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsUnit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','units','available','payment_id','status'];
}
