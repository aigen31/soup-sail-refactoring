<?php

namespace App\Http\Controllers\Control\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Control\Project\ProjectResource;
use App\Models\Control\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Create new Project
   *
   * @return array<string, mixed>
   */
  public function store(Request $request)
  {
    $hasPermissions = $request->user()->hasPermissions(['project_create']);

    if ($hasPermissions) {
      return new ProjectResource(Project::create([
        'name' => $request->input('project_name'),
        'description' => $request->input('project_description'),
      ]));
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return new ProjectResource(Project::findOrFail($id));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Project::destroy($id);
  }
}
