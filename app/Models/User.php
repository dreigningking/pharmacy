<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Country;

class User extends Authenticatable
{

    use HasFactory, Notifiable, SoftDeletes;
    
    protected $fillable = [
        'name','email','mobile','password','timezone','currency_id','country_id','state_id','city_id','role_id','parent_id'
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
        return $this->belongsToMany(Pharmacy::class);
    }
    
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function hasRole($value){
        return in_array($value,$this->roles->pluck('name')->toArray()) ? true:false;
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
 
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function withdrawals(){
        return $this->morphMany(Withdrawal::class, 'withdrawable');
    }

}
