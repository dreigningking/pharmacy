<?php

namespace App\Models;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;
    protected $appends = ['price'];
    
    protected $fillable = [
        'name','description','price_ngn','price_usd','minimum','trial'
    ];
    protected $casts = ['price_ngn'=> 'array','price_usd'=> 'array','minimum'=> 'array','trial'=> 'array'];

    public function getPriceAttribute(){
        return session('currency_code') == 'NGN'? $this->price_ngn : $this->price_usd;
    }

    public function subscription(){
        return $this->hasMany(Subscription::class);
    }

}
