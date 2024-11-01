<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Models\Control\Permission;
use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectPermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  protected $permissions = [
    'project_create' => 'Project Create',
    'project_update' => 'Project Update',
    'project_delete' => 'Project Delete',
    'project_state_update' => 'Project State Update',
    'project_target_create' => 'Project Target Create',
    'project_target_update' => 'Project Target Update',
    'project_delegated_update' => 'Delegated Project Update',
    'project_show_all' => 'Show All Projects',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
