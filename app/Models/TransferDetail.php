<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferDetail extends Model
{
    use HasFactory;
    protected $fillable = ['transfer_id','inventory_id','batch_id','unit_cost','quantity','amount'];
}
