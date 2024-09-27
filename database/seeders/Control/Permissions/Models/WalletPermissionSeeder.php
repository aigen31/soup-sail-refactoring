<?php

namespace Database\Seeders\Control\Permissions\Models;

use App\Traits\Control\Permissions\CreatePermissionsTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletPermissionSeeder extends Seeder
{
  use CreatePermissionsTrait;

  public $permissions = [
    'wallet_deposit' => 'Wallet Deposit',
    'wallet_withdraw' => 'Wallet Withdraw',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $this->create();
  }
}
