<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportPermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  public $permissions = [
    'company_send_conf_link' => 'Company Send Conf Link',
    'support_request' => 'support Request',
    'support_accept_task' => 'support Accept Task',
    'support_accept_common' => 'support Accept Common',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
