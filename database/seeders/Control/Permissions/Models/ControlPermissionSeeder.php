<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ControlPermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  public $permissions = [
    'moderator_create' => 'Moderator Create',
    'admin_create' => 'Admin Create',
    'specialist_create' => 'Specialist Create',
    'client_create' => 'Client Create',
    'super_admin_create' => 'Super_admin Create',
    'arbitration_create' => 'Arbitration Create',
    'moderator_update' => 'Moderator Update',
    'administrator_update' => 'Administrator Update',
    'specialist_update' => 'Specialist Update',
    'client_update' => 'Client Update',
    'arbitration_update' => 'Arbitration Update',
    'moderator_ban' => 'Moderator Ban',
    'administrator_ban' => 'Administrator Ban',
    'specialist_ban' => 'Specialist Ban',
    'client_ban' => 'Client Ban',
    'arbitration_ban' => 'Arbitration Ban',
    'moderator_delete' => 'Moderator Delete',
    'administrator_delete' => 'Administrator Delete',
    'specialist_delete' => 'Specialist Delete',
    'client_delete' => 'Client Delete',
    'role_change' => 'Role Change',
    'users_view' => 'Users View',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
