<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatPermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  protected $permissions = [
    'chat_create' => 'Chat Create',
    'chat_message' => 'Chat Message',
    'chat_attachment' => 'Chat Attachment',
    'chat_state' => 'Chat State',
    'chat_work_result' => 'Chat Work Result',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
