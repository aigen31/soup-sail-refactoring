<?php

namespace Database\Seeders\Control\Users;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
      'user_role_id' => 1,
    ]);

    User::firstOrCreate([
      'name' => 'Moderator',
      'email' => 'moderator@mie.ru',
      'password' => Hash::make('password'),
      'user_role_id' => 2,
    ]);

    User::firstOrCreate([
      'name' => 'Business Owner',
      'email' => 'business_owner@mie.ru',
      'password' => Hash::make('password'),
      'company_id' => 1,
      'user_role_id' => 3,
    ]);

    User::firstOrCreate([
      'name' => 'Specialist Freelance',
      'email' => 'specialist_freelance@mie.ru',
      'password' => Hash::make('password'),
      'user_role_id' => 4,
    ]);

    User::firstOrCreate([
      'name' => 'Specialist Full-Time',
      'email' => 'specialist_fulltime@mie.ru',
      'password' => Hash::make('password'),
      'user_role_id' => 4,
    ]);

    User::firstOrCreate([
      'name' => 'Specialist Busy',
      'email' => 'specialist_busy@mie.ru',
      'password' => Hash::make('password'),
      'user_role_id' => 4,
    ]);
  }
}
