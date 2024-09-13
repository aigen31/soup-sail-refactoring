<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\PermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromocodePermissionSeeder extends Seeder
{
  use PermissionsTrait;

  public $permissions = [
    'promocode_create',
    'promocode_delete',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
