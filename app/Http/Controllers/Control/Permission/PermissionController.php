<?php

namespace App\Http\Controllers\Control\Permission;

use App\Http\Controllers\Controller;
use App\Models\Control\Permission;

class PermissionController extends Controller
{
  /**
   * Get permission model by id
   *
   * @property string $permissions
   * @return Illuminate\Database\Eloquent\Collection
   */
  public static function getBySlug(string|array $permissions)
  {
    if (is_array($permissions)) {
      return Permission::whereIn('slug', $permissions)->get();
    } else {
      return Permission::where('slug', $permissions)->get();
    }
  }
}
