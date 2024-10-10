<?php

namespace Database\Seeders\Control\Users;

use App\Http\Controllers\Control\Role\RoleController;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::firstOrCreate([
      'name' => 'Admin',
      'email' => 'admin@mie.ru',
      'password' => Hash::make('password'),
      'role_id' => RoleController::getBySlug('admin', true),
    ]);

    User::firstOrCreate([
      'name' => 'Super Admin',
      'email' => 'super_admin@mie.ru',
      'password' => Hash::make('password'),
      'role_id' => RoleController::getBySlug('super_admin', true),
    ]);

    User::firstOrCreate([
      'name' => 'Moderator',
      'email' => 'moderator@mie.ru',
      'password' => Hash::make('password'),
      'role_id' => RoleController::getBySlug('moderator', true),
    ]);

    User::firstOrCreate([
      'name' => 'Business Owner 1',
      'email' => 'business_owner@mie.ru',
      'password' => Hash::make('password'),
      'role_id' => RoleController::getBySlug('client', true),
    ]);

    User::firstOrCreate([
      'name' => 'Business Owner 2',
      'email' => 'business_owner2@mie.ru',
      'password' => Hash::make('password'),
      'role_id' => RoleController::getBySlug('client', true),
    ]);

    User::firstOrCreate([
      'name' => 'Specialist Freelance',
      'email' => 'specialist_freelance@mie.ru',
      'password' => Hash::make('password'),
      'role_id' => RoleController::getBySlug('specialist', true),
    ]);

    User::firstOrCreate([
      'name' => 'Specialist Full-Time',
      'email' => 'specialist_fulltime@mie.ru',
      'password' => Hash::make('password'),
      'role_id' => RoleController::getBySlug('specialist', true),
    ]);

    User::firstOrCreate([
      'name' => 'Specialist Busy',
      'email' => 'specialist_busy@mie.ru',
      'password' => Hash::make('password'),
      'role_id' => RoleController::getBySlug('specialist', true),
    ]);

    User::firstOrCreate([
      'name' => 'Arbitration',
      'email' => 'arbitration@mie.ru',
      'password' => Hash::make('password'),
      'role_id' => RoleController::getBySlug('arbitration', true),
    ]);

    User::firstOrCreate([
      'name' => 'Support',
      'email' => 'support@mie.ru',
      'password' => Hash::make('password'),
      'role_id' => RoleController::getBySlug('support', true),
    ]);
  }
}
