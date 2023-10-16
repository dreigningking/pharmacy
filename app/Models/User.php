<?php

namespace App\Models;

use App\Models\City;
use App\Models\Role;
use App\Models\Order;
use App\Models\State;
use App\Models\Country;
use App\Models\License;
use App\Models\SmsUnit;
use App\Models\Pharmacy;
use App\Models\Permission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasFactory, Notifiable, SoftDeletes;
    
    protected $fillable = [
        'name','type','email','password','pharmacy_id','role_id','require_password_change','country_id','state_id','city_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => ['name'],
                'separator' => '_'
            ]
        ];
    }

    public function routeNotificationForNexmo($notification){
        return $this->mobile;
    }
    public function getCurrencyAttribute()
    {
        return strtolower($this->country->currency_iso);
    }
    public function getCurrencySymbolAttribute()
    {
        return $this->country->currency_symbol;
    }
    public function receivesBroadcastNotificationsOn(){
        return 'users.'.$this->id;
    }

    public function pharmacies(){
        return $this->hasMany(Pharmacy::class,'owner_id');
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function isRole($value){
        return $this->role->name == $value;
    }
    
    public function isAnyRole($value){
        $roles = Role::whereIn('name',$value)->get()->pluck('id')->toArray();
        return in_array($this->role_id,$roles);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_users');
    }
    public function hasPermission($value){
        return $this->permissions->where('name',$value)->isNotEmpty();
    }
    public function hasPermability($value,$ability){
        return $this->permissions->where('name',$value)->where("pivot.$ability",1)->isNotEmpty();
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function password_histories(){
        return $this->hasMany(PasswordHistory::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
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

    public function licenses(){
        return $this->hasMany(License::class);
    }
    public function availableLicenses(){
        // return $this->hasOne(License::class)->ofMany([],function ($query) { $query->where('start_at', '<', now())->where('expire_at','>',now()); });
        return $this->hasMany(License::class)->where('pharmacy_id',null)->whereNotNull('start_at');
    }
    public function activeLicenses(){
        return $this->hasMany(License::class)->where('pharmacy_id','!=',null)->whereNotNull('start_at')->where('start_at', '<', now())->where('expire_at','>',now());
    }

    public function smsUnits(){
        return $this->hasMany(SmsUnit::class);
    }

    public function availableSmsUnits(){
        return $this->hasMany(SmsUnit::class)->where('available','>',0);
    }

}
