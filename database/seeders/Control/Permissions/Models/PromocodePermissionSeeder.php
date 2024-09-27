<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromocodePermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  public $permissions = [
    'promocode_create' => 'Promocode Create',
    'promocode_delete' => 'Promocode Delete',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
