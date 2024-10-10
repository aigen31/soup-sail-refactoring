<?php

namespace App\Http\Controllers\Control\Project;

use App\Exceptions\Control\Exceptions\ForbiddenException;
use App\Http\Controllers\Control\Notification\NotificationController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Control\Project\ProjectResource;
use App\Models\Control\Project;
use App\Models\User;
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
   * Create new Project for target user
   *
   * @return array<string, mixed>
   */
  public function storeTarget(Request $request)
  {
    $request->validate([
      'project_name' => 'required|string|min:5|max:50',
      'project_description' => 'required|string|min:5|max:100',
      'user_id' => 'required|integer|min:0',
    ]);

    $userId = $request->input('user_id');
    $user = User::findOrFail($userId);
    $request->user()->ensureAccess('project_target_create');
    $user->ensureAccess('project_create');

    $this->create($user, $request, true);
  }

  /**
   * Create new Project
   *
   * @return array<string, mixed>
   */
  public function store(Request $request)
  {
    $request->validate([
      'project_name' => 'required|string|min:5|max:50',
      'project_description' => 'required|string|min:5|max:100',
    ]);

    $user = $request->user();
    $request->user()->ensureAccess('project_createe');

    $this->create($user, $request, false);
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

  protected function create($user, Request $request, bool $sendNotification)
  {
    $project = $user->projects()->create([
      'name' => $request->input('project_name'),
      'description' => $request->input('project_description')
    ]);

    if ($sendNotification) {
      NotificationController::store($request, $project);
    }

    return new ProjectResource($project);
  }
}
