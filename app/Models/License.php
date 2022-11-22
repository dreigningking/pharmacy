<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class License extends Model
{
    use HasFactory,SoftDeletes;

    public function active(){
        return $this->start_at < now() && $this->expire_at > now();
    }

}
