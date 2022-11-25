<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
  use HasFactory;

  protected $guarded = [];

  protected $casts = [
    'date_created' => 'datetime',
    'id_issue_date' => 'datetime',
    'id_expiry_date' => 'datetime',
    'retire_date' => 'datetime',
    'loan_date_issued' => 'datetime',
  ];

  public function reapplication()
  {
    return $this->hasMany(Reapplication::class, 'ippis', 'ippis');
  }
  
}
