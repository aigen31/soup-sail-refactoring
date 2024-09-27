<?php

namespace App\Traits\Control\Permissions;

use App\Models\Control\Permission;

trait CreatePermissionsTrait
{
  public function create()
  {
    foreach ($this->permissions as $slug => $name) {
      Permission::create([
        'slug' => $slug,
        'name' => $name,
      ]);
    }
  }
}
