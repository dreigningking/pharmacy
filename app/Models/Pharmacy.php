<?php

namespace App\Models;


use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\State;
use App\Models\Country;
use App\Models\License;
use App\Models\Patient;
use App\Models\Supplier;
use App\Models\Inventory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Assessment;
use App\Models\Prescription;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacy extends Model
{
    use HasFactory,Notifiable;
    
    protected $fillable = [
        'name','description','email','mobile','image','license','type','country_id','state_id','city_id'
    ];
    public static function boot(){
        parent::boot();
        parent::observe(new \App\Observers\PharmacyObserver);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function owner(){
        return $this->belongsTo(User::class,'owner_id');
    }
    public function suppliers(){
        return $this->belongsToMany(Supplier::class,'pharmacy_suppliers');
    }
    
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    
    public function inventories(){
        return $this->hasMany(Inventory::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function patients(){
        return $this->hasMany(Patient::class);
    }
    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }
    public function assessments(){
        return $this->hasMany(Assessment::class);
    }
    public function license(){
        return $this->hasMany(License::class);
    }

}