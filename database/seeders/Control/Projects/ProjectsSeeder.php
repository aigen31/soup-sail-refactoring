<?php

namespace Database\Seeders\Control\Projects;

use App\Http\Controllers\Control\Role\RoleController;
use App\Models\Control\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $assistants = User::where('role_id', RoleController::getBySlug('moderator'))->get();

    Project::factory()->count(10)->create()->each(function (Project $project) use ($assistants) {
      $project->assistants()->attach(
        $assistants->random(1)->pluck('id')
      );
    });
  }
}
