<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyPermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  protected $permissions = [
    'company_control' => 'Company Control',
    'company_validation_request' => 'Company Salidation Request',
    'company_validation_state' => 'Company Salidation State',
    'company_send_conf_link' => 'Company Send Conf Link',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
