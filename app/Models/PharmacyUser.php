<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PharmacyUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','pharmacy_id','role_id','status'
    ];
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
