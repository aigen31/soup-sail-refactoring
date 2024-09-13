<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Models\Control\Permission;
use App\Traits\Control\PermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectPermissionSeeder extends Seeder
{
  use PermissionsTrait;

  public $permissions = [
    'project_create',
    'project_update',
    'project_delete',
    'project_state_update',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
