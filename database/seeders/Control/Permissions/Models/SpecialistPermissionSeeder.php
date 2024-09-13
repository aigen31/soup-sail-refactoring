<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\PermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialistPermissionSeeder extends Seeder
{
  use PermissionsTrait;

  public $permissions = [
    'specialist_validation_request',
    'specialist_validation_state',
    'specialist_send_conf_link',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
