<?php

namespace App\Orchid\Screens\Control\Project;

use App\Exceptions\Control\Exceptions\ForbiddenException;
use App\Http\Controllers\Control\Project\ProjectController;
use App\Models\Control\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ProjectCurrentUserScreen extends Screen
{
  /**
   * Fetch data to be displayed on the screen.
   *
   * @return array
   */
  public function query(): iterable
  {
    return [
      'projects' => Auth::user()->projects()->filters()->defaultSort('id')->paginate()
    ];
  }

  /**
   * The name of the screen displayed in the header.
   *
   * @return string|null
   */
  public function name(): ?string
  {
    return 'Project Controls';
  }

  /**
   * The description is displayed on the user's screen under the heading
   */
  public function description(): ?string
  {
    return 'Create own project for service ordering and task organization';
  }

  /**
   * The screen's action buttons.
   *
   * @return \Orchid\Screen\Action[]
   */
  public function commandBar(): iterable
  {
    return [
      ModalToggle::make('Add Project')
        ->modal('projectModal')
        ->method('create')
        ->icon('plus')
    ];
  }

  /**
   * The screen's layout elements.
   *
   * @return \Orchid\Screen\Layout[]|string[]
   */
  public function layout(): iterable
  {
    return [
      Layout::table('projects', [
        TD::make('id')
          ->sort(),
        TD::make('name')
          ->sort()
          ->filter(Input::make()),
        TD::make('description'),
        TD::make('created_at', 'Created')
          ->sort(),
        TD::make('updated_at', 'Last edit'),

        TD::make('Actions')
          ->alignRight()
          ->render(function (Project $project) {
            return Button::make('Delete Project')
              ->confim('After deleting, the project will be gone forever.')
              ->method('delete', [
                'projectId' => $project->id,
              ]);
          })
      ]),

      Layout::modal('projectModal', Layout::rows([
        Input::make('project_name')
          ->title('Name')
          ->placeholder('Enter project name'),
        Input::make('project_description')
          ->title('Description')
          ->placeholder('Enter project description')
      ]))
        ->title('Create Project')
        ->applyButton('Add Project'),
    ];
  }

  /**
   * Create project method
   *
   * @param $request
   * @return array<string, mixed>
   */
  public function create(Request $request)
  {
    try {
      $projectController = new ProjectController;
      $projectController->store($request);
    } catch (ForbiddenException $exception) {
      Alert::error($exception->getMessage());
    }
  }

  /**
   * Delete project method
   *
   * @param $request
   * @return void
   */
  public function delete(Request $request)
  {
    $projectController = new ProjectController;
    $projectController->destroy($request->input('projectId'));
  }

  public function permission(): ?iterable
  {
    return [
      'project_create',
      'project_update',
    ];
  }
}
