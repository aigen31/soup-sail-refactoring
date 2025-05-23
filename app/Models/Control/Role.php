<?php

namespace App\Models\Control;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;

  public function permissions()
  {
    return $this->belongsToMany(Permission::class);
  }

  public function users()
  {
    return $this->hasMany(User::class);
  }
}
