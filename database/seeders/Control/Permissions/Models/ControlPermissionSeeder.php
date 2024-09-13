<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\PermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ControlPermissionSeeder extends Seeder
{
  use PermissionsTrait;

  public $permissions = [
    'moderator_create',
    'admin_create',
    'specialist_create',
    'client_create',
    'super_admin_create',
    'arbitration_create',
    'moderator_update',
    'administrator_update',
    'specialist_update',
    'client_update',
    'arbitration_update',
    'moderator_ban',
    'administrator_ban',
    'specialist_ban',
    'client_ban',
    'arbitration_ban',
    'moderator_delete',
    'administrator_delete',
    'specialist_delete',
    'client_delete',
    'role_change',
    'users_view',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
