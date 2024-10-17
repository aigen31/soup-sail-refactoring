<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArbitrationPermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  protected $permissions = [
    'arbitration_accept' => 'Arbitration Accept',
    'arbitration_create' => 'Arbitration Create',
    'arbitartion_decision' => 'Arbitrarion Decision',
    'arbitration_define_right' => 'Arbitration Define Right',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
