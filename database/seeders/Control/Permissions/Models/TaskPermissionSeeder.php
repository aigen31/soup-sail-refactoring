<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\PermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskPermissionSeeder extends Seeder
{
  use PermissionsTrait;

  public $permissions = [
    'task_create',
    'task_update',
    'task_update_request',
    'task_delete',
    'task_specialist_request',
    'task_specialist_kick',
    'task_specialist_accept',
    'task_buy_service_request',
    'task_state_update',
    'task_check_request',
    'task_accept_result',
    'task_reject_result',
    'task_arbitration_request',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
