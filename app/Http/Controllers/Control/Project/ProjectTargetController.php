<?php

namespace App\Http\Controllers\Control\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Control\Project\ProjectResourceCollection;
use App\Models\Control\Project;
use App\Models\User;
use App\Traits\Control\Project\ProjectTrait;
use Illuminate\Http\Request;

class ProjectTargetController extends Controller
{
  use ProjectTrait;

  /**
   * Display a listing of the projects.
   *
   * @return \App\Http\Resources\Control\Project\ProjectResourceCollection
   */
  public function index()
  {
    $this->user->ensureAccess('project_show_all');

    return new ProjectResourceCollection(Project::all());
  }

  /**
   * Create new Project for target user
   *
   * @return App\Http\Resources\Control\Project\ProjectResource
   */
  public function store(Request $request)
  {
    $this->userIdValidate($request);
    $this->fieldsValidate($request);
    $user = User::findOrFail($this->data['user_id']);
    $this->user->ensureAccess('project_target_create');
    $user->ensureAccess('project_create');

    return $this->create($user, $request, true);
  }

  /**
   * Update the project model.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request, string $projectId)
  {
    $request->validate([
      'project_name' => 'string|min:5|max:50|nullable',
      'project_description' => 'string|min:5|max:100|nullable',
    ]);

    $this->user->ensureAccess('project_target_update');

    $project = Project::findOrFail($projectId);

    $project->validateStatus();

    $project->update($this->data);

    return response()->json([
      'result' => 'success'
    ], 200);
  }

  /**
   * Update the status id of project.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function setStatus(Request $request, string $projectId)
  {
    $request->validate([
      'status_id' => 'required|integer|min:1|max:2'
    ]);

    $this->user->ensureAccess('project_state_update');

    Project::findOrFail($projectId)->update([
      'status_id' => $request->input('status_id'),
    ]);

    return response()->json([
      'result' => 'success'
    ], 200);
  }
}
