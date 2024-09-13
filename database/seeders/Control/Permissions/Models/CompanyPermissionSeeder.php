<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\PermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyPermissionSeeder extends Seeder
{
  use PermissionsTrait;

  public $permissions = [
    'company_control',
    'company_validation_request',
    'company_validation_state',
    'company_send_conf_link',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
