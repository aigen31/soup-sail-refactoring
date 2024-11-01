<?php

namespace App\Http\Controllers\Control\Role;

use App\Http\Controllers\Control\Permission\PermissionController;
use App\Http\Controllers\Controller;
use App\Models\Control\Role;
use Illuminate\Support\Collection;

class RoleController extends Controller
{
  /**
   * Get by name
   *
   * @param string $roleName
   * @return int|Collection
   */
  public static function getBySlug(string $roleSlug, bool $onlyId = true)
  {
    $role = Role::where('slug', $roleSlug)->first();

    if ($onlyId) {
      return $role->id;
    } else {
      return $role;
    }
  }

  /**
   * Add permission for user role
   *
   * @param string $roleSlug
   * @param Collection $permissionName
   */
  public static function addPermission(string $roleSlug, array $permissions)
  {
    $permission = PermissionController::getBySlug($permissions)->pluck('id');
    self::getBySlug($roleSlug, false)->permissions()->attach($permission);
  }
}
