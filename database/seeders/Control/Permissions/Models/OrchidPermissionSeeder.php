<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrchidPermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  protected $permissions = [
    'platform.index' => 'Platform Index',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
