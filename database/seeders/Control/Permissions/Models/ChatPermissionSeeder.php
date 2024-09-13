<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\PermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatPermissionSeeder extends Seeder
{
  use PermissionsTrait;

  public $permissions = [
    'chat_create',
    'chat_message',
    'chat_attachment',
    'chat_state',
    'chat_work_result',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
