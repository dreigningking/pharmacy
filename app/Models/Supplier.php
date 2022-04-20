<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\City;
use App\Models\State;
use App\Models\Pharmacy;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Supplier extends Model
{
    protected $fillable = [	'name','description','email','mobile','image','country_id','state_id','city_id','bank_id','bank_account'];
    use HasFactory;

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function pharmacies(){
        return $this->belongsToMany(Pharmacy::class,'pharmacy_suppliers');
    }
    public function bank(){
        return $this->belongsTo(Bank::class);
    }
}
