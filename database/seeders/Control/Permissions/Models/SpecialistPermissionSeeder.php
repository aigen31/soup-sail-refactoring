<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialistPermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  public $permissions = [
    'specialist_validation_request' => 'Specialist Validation Request',
    'specialist_validation_state' => 'Specialist Validation State',
    'specialist_send_conf_link' => 'Specialist Send Conf Link',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
