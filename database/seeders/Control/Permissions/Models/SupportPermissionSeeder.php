<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\PermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportPermissionSeeder extends Seeder
{
  use PermissionsTrait;

  public $permissions = [
    'company_send_conf_link',
    'support_request',
    'support_accept_task',
    'support_accept_common',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
