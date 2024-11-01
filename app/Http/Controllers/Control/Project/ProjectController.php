<?php

namespace App\Http\Controllers\Control\Project;

use App\Http\Controllers\Control\Role\RoleController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Control\Project\ProjectResource;
use App\Http\Resources\Control\Project\ProjectResourceCollection;
use App\Models\Control\Project;
use App\Models\User;
use App\Traits\Control\Project\CanCreateProjectTrait;
use App\Traits\Control\Project\ProjectTrait;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  use CanCreateProjectTrait;

  /**
   * Display a listing of the projects.
   *
   * @return \App\Http\Resources\Control\Project\ProjectResourceCollection
   */
  public function index()
  {
    return new ProjectResourceCollection($this->user->projects->all());
  }

  /**
   * Create new Project for current user
   *
   * @return App\Http\Resources\Control\Project\ProjectResource
   */
  public function store(Request $request)
  {
    $this->fieldsValidate($request);
    $this->user->ensureAccess('project_create');

    return $this->create($this->user, $request, false);
  }

  /**
   * Display the specified resource.
   *
   * @return App\Http\Resources\Control\Project\ProjectResource
   */
  public function show(string $id)
  {
    $hasAnyAccess = $this->user->hasAnyAccess(['project_show_all']);

    return $hasAnyAccess ? new ProjectResource(Project::findOrFail($id)) : new ProjectResource($this->user->projects()->findOrFail($id));
  }

  /**
   * Update the specified resource in storage.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request, string $projectId)
  {
    $this->updateValidate($request);

    $this->user->ensureAccess('project_update');
    $project = $this->user->projects()->findOrFail($projectId);
    $project->validateStatus();
    $project->update($this->data);

    return response()->json([
      'result' => 'success'
    ], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy(string $id)
  {
    $this->user->ensureAccess('project_delete');

    Project::destroy($id);
  }
}
