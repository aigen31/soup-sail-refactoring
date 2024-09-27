<?php

namespace Database\Seeders\Control\Roles;

use App\Models\Control\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  public $roles = [
    'client' => 'Client',
    'moderator' => 'Moderator',
    'admin' => 'Admin',
    'super_admin' => 'Super Admin',
    'arbitration' => 'Arbitration',
    'specialist' => 'Specialist',
    'support' => 'Support'
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    foreach ($this->roles as $slug => $name) {
      Role::create([
        'slug' => $slug,
        'name' => $name
      ]);
    }
  }
}
