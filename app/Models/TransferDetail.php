<?php

namespace App\Models;

use App\Models\Transfer;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransferDetail extends Model
{
    use HasFactory;
    protected $fillable = ['transfer_id','inventory_id','batch_id','unit_cost','quantity','amount'];

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
    public function transfer(){
        return $this->belongsTo(Transfer::class);
    }
}
