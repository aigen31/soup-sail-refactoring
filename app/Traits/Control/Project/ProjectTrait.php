<?php

namespace App\Traits\Control\Project;

use App\Http\Controllers\Control\Notification\NotificationController;
use App\Http\Resources\Control\Project\ProjectResource;
use App\Models\User;
use Illuminate\Http\Request;

trait ProjectTrait
{
  /**
   * @var string Name of the project
   */
  protected string $projectName;

  /**
   * @var string Description of the project
   */
  protected string $projectDescription;

  /**
   * @var integer Id of the user
   */
  protected string $userId;

  /**
   * @var string User model
   */
  protected User $user;

  /**
   * @var array Data without empty fields
   */
  protected array $data;

  public function __construct(Request $request)
  {
    $this->data = $this->getFields($request);
    $this->user = $request->user();
  }

  /**
   * Create project model.
   *
   * @return App\Http\Resources\Control\Project\ProjectResource
   */
  protected function create(User $user, Request $request, bool $sendNotification)
  {
    $project = $user->projects()->create($this->data);

    if ($sendNotification) {
      NotificationController::store($request, $project);
    }

    return new ProjectResource($project);
  }

  /**
   * Project fields validation.
   *
   * @return void
   */
  protected function fieldsValidate(Request $request)
  {
    $request->validate([
      'project_name' => 'required|string|min:5|max:50',
      'project_description' => 'required|string|min:5|max:100',
    ]);
  }

  /**
   * User id validation.
   *
   * @return void
   */
  protected function userIdValidate(Request $request)
  {
    $request->validate([
      'user_id' => 'required|integer|min:1',
    ]);
  }

  /**
   * Get not empty fields.
   *
   * @return array
   */
  protected function getFields(Request $request): array
  {
    return array_filter([
      'name' => $request->input('project_name'),
      'description' => $request->input('project_description'),
      'user_id' => $request->input('user_id'),
    ], function ($value) {
      return !is_null($value) && $value !== '';
    });
  }
}
