<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Order;
use App\Models\Country;
use App\Models\Pharmacy;
use App\Models\Permission;
use App\Models\PharmacyUser;
use App\Models\Subscription;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasFactory, Notifiable, SoftDeletes;
    
    protected $fillable = [
        'name','email','password','pharmacy_id','role_id','admin','require_password_change','country_id','state_id','city_id',
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
    // public function getNameAttribute()
    // {
    //     return ucwords($this->firstname.' '.$this->surname);
    // }
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
        return $this->belongsToMany(Permission::class,'permission_users')->withPivot('list','view','edit','new','remove');
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

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
    
    public function orders(){
        return $this->hasMany(Order::class);
    }

}
