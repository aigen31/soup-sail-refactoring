<?php

namespace Database\Seeders\Control\Projects;

use App\Models\Control\Project;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Project::factory()->count(10)->create();
  }
}
