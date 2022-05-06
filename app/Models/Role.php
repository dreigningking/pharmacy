<?php

namespace App\Models;


use App\Models\PharmacyUser;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];
    
    public function users(){
        return $this->hasMany(PharmacyUser::class);
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_roles')->withPivot('list','view','edit','new','remove');
    }
}
