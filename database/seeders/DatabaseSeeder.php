<?php

namespace Database\Seeders;

use Database\Seeders\Control\Permissions\Models\ArbitrationPermissionSeeder;
use Database\Seeders\Control\Permissions\Models\ChatPermissionSeeder;
use Database\Seeders\Control\Permissions\Models\CompanyPermissionSeeder;
use Database\Seeders\Control\Permissions\Models\ControlPermissionSeeder;
use Database\Seeders\Control\Permissions\Models\ProjectPermissionSeeder;
use Database\Seeders\Control\Permissions\Models\PromocodePermissionSeeder;
use Database\Seeders\Control\Permissions\Models\SpecialistPermissionSeeder;
use Database\Seeders\Control\Permissions\Models\SupportPermissionSeeder;
use Database\Seeders\Control\Permissions\Models\TaskPermissionSeeder;
use Database\Seeders\Control\Permissions\Models\WalletPermissionSeeder;
use Database\Seeders\Control\Relationships\PermissionRoleSeeder;
use Database\Seeders\Control\Roles\RoleSeeder;
use Database\Seeders\Control\Users\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public $permissions = [
    ArbitrationPermissionSeeder::class,
    ChatPermissionSeeder::class,
    CompanyPermissionSeeder::class,
    ControlPermissionSeeder::class,
    ProjectPermissionSeeder::class,
    PromocodePermissionSeeder::class,
    SpecialistPermissionSeeder::class,
    SupportPermissionSeeder::class,
    TaskPermissionSeeder::class,
    WalletPermissionSeeder::class,
  ];

  /**
   * Seed the application's database.
   */
  public function run(): void {
    $this->call($this->permissions);

    $this->call([
      RoleSeeder::class,
      UserSeeder::class,
      PermissionRoleSeeder::class,
    ]);
  }
}
