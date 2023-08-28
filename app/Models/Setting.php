<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['name','value'];

    protected function getItemsAttribute(){
        return json_decode($this->value,true);
    }
    
}
