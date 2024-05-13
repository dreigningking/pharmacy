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
    protected $casts = ['expire_at' => 'datetime'];

    public static function boot()
    {
        parent::boot();
        parent::observe(new BatchObserver);
    }
    
    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }

    public function getWorthAttribute(){
        return $this->inventory->unit_cost * $this->quantity;
    }

    public function getDayAttribute(){
        return $this->expire_at->format('l');
    }

    public function getWeekAttribute(){
        return $this->expire_at->weekOfYear;
    }

    public function getMonthAttribute(){
        return $this->expire_at->monthName;
    }

    public function getQuarterAttribute(){
        return $this->expire_at->quarter;
    }
    
    public function getYearAttribute(){
        return $this->expire_at->format('Y');
    }
}
