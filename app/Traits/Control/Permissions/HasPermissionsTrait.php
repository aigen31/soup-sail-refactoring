<?php

namespace App\Traits\Control\Permissions;

use App\Exceptions\Control\Exceptions\ForbiddenException;
use Illuminate\Support\Facades\Request;

trait HasPermissionsTrait
{
  public static function hasPermissions(array $permissions)
  {
    $permissionsCollection = Request::user()->role()->first()->permissions()->whereIn('slug', $permissions)->get();

    if ($permissionsCollection->isEmpty() || count($permissions) !== $permissionsCollection->count()) {
      throw new ForbiddenException('Current user haven\'t access');
    }

    return true;
  }
}
