<?php

namespace App\Models;


use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\State;
use App\Models\Country;
use App\Models\License;
use App\Models\Patient;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Inventory;
use App\Models\Assessment;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacy extends Model
{
    use HasFactory,Notifiable,Sluggable,SoftDeletes;
    
    protected $fillable = [
        'owner_id','name','description','email','mobile','image','license','type',
        'country_id','state_id','city_id','address','sms_credit','shelves','categories'
    ];

    protected $casts = ['notify_stock_limit'=> 'array','notify_expired_items'=> 'array','notify_purchase_order'=> 'array',
    'notify_sales_record'=> 'array','notify_patients_welcome'=> 'array','notify_patient_diagnosis'=> 'array',
    'notify_patient_prescription'=> 'array','notify_patient_feedback'=> 'array'];

    public static function boot(){
        parent::boot();
        parent::observe(new \App\Observers\PharmacyObserver);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name'],
                'separator' => '_'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function owner(){
        return $this->belongsTo(User::class,'owner_id');
    }
    public function suppliers(){
        return $this->hasMany(Supplier::class);
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
    public function sales(){
        return $this->hasMany(Sale::class);
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
    public function licenses(){
        return $this->hasMany(License::class);
    }
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
    public function activeLicense(){
        return $this->hasOne(License::class)->ofMany([],function ($query) { $query->where('status',true)->where('start_at', '<', now())->where('expire_at','>',now()); });
        // return $this->hasMany(License::class)->where('start_at', '<', now())->where('expire_at','>',now());
    }

}