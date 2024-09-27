<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;

  public function permissions()
  {
    return $this->belongsToMany(Permission::class);
  }
}