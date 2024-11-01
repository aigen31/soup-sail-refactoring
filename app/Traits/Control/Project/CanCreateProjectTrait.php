<?php

namespace App\Traits\Control\Project;

use App\Http\Controllers\Control\Notification\NotificationController;
use App\Http\Resources\Control\Project\ProjectResource;
use App\Models\User;
use Illuminate\Http\Request;

trait CanCreateProjectTrait
{
  use ProjectTrait;

  /**
   * Create project model.
   *
   * @return App\Http\Resources\Control\Project\ProjectResource
   */
  protected function create(User $user, Request $request, bool $sendNotification)
  {
    $assistant = $this->defineAssistant();

    $project = $assistant->assistantProject()->create([
      'name' => $request->input('project_name'),
      'description' => $request->input('project_description'),
      'user_id' => $user->id,
    ]);

    if ($sendNotification) {
      NotificationController::store($request, $project);
    }

    return new ProjectResource($project);
  }
}
