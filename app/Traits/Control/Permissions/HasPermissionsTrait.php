<?php

namespace App\Traits\Control\Permissions;

use App\Exceptions\Control\Exceptions\ForbiddenException;
use Illuminate\Support\Facades\Request;

trait HasPermissionsTrait
{
  public function hasAccess(string $permit, bool $cache = true): bool
  {
    if (empty($permit)) {
      return true;
    }

    $permissionsCollection = $this->role()->first()->permissions()->where('slug', $permit)->first();

    if (empty($permissionsCollection)) {
      return false;
    }

    return true;
  }

  public function hasAnyAccess($permissions, bool $cache = true): bool
  {
    if (empty($permissions)) {
      return true;
    }

    $permissionsCollection = $this->role()->first()->permissions()->whereIn('slug', $permissions)->get();

    if ($permissionsCollection->isEmpty() || count($permissions) !== $permissionsCollection->count()) {
      return false;
    }

    return true;
  }
  
  public function ensureAccess(string $permit) {
    if ($this->hasAccess($permit)) {
      return true;
    } else {
      throw new ForbiddenException();
    }
  }
}
