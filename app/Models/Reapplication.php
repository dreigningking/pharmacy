<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reapplication extends Model
{
  use HasFactory;

  protected $guarded = [];

  protected $casts = ['date_created' => 'datetime'];

  public function application()
  {
    return $this->hasOne(LoanApplication::class, 'ippis', 'ippis');
  }

}
