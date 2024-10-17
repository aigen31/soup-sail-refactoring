<?php

namespace Database\Seeders\Control\Projects;

use App\Models\Control\ProjectStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectStatusSeeder extends Seeder
{
  protected $statuses = [
    'active' => 'Active',
    'closed' => 'Closed',
  ];

  /**
   * Run the database seeds.
   */
  public function run(): void {
    foreach ($this->statuses as $slug => $name) {
      ProjectStatus::create([
        'slug' => $slug,
        'name' => $name,
      ]);
    }
  }
}
