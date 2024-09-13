<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\PermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArbitrationPermissionSeeder extends Seeder
{
  use PermissionsTrait;

  public $permissions = [
    'arbitration_accept',
    'arbitration_create',
    'arbitartion_decision',
    'arbitration_define_right',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
