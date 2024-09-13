<?php

namespace App\Traits\Control;

use App\Models\Control\Permission;

trait PermissionsTrait
{
  public function create()
  {
    foreach ($this->permissions as $permission) {
      Permission::create([
        'name' => $permission,
      ]);
    }
  }
}
