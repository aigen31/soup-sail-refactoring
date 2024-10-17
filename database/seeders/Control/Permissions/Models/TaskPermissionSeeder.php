<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskPermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  protected $permissions = [
    'task_create' => 'Task Create',
    'task_update' => 'Task Update',
    'task_update_request' => 'Task Update Request',
    'task_delete' => 'Task Delete',
    'task_specialist_request' => 'Task Specialist Request',
    'task_specialist_kick' => 'Task Specialist Kick',
    'task_specialist_accept' => 'Task Specialist Accept',
    'task_buy_service_request' => 'Task Buy Service Request',
    'task_state_update' => 'Task State Update',
    'task_check_request' => 'Task Check Request',
    'task_accept_result' => 'Task Accept Result',
    'task_reject_result' => 'Task Reject Result',
    'task_arbitration_request' => 'Task Arbitration Request',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
