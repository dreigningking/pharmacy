<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','features','amount','trial'];
    protected $casts = ['features'=> 'array'];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
    public function orders(){
        return $this->morphMany(Order::class, 'orderable');
    }
}
