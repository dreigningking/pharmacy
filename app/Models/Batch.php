<?php

namespace App\Models;

use App\Models\Inventory;
use App\Observers\BatchObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = ['expire_at','number','quantity','inventory_id'];
    protected $dates = ['expire_at'];

    public static function boot()
    {
        parent::boot();
        parent::observe(new BatchObserver);
    }
    
    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
}
