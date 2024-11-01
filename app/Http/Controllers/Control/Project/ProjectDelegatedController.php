<?php

namespace App\Http\Controllers\Control\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Control\Project\ProjectResource;
use App\Http\Resources\Control\Project\ProjectResourceCollection;
use App\Models\Control\Project;
use App\Models\User;
use App\Traits\Control\Project\ProjectTrait;
use Illuminate\Http\Request;

class ProjectDelegatedController extends Controller
{
    use ProjectTrait;

    public function show(string $id)
    {
        $this->user->ensureAccess('project_delegated_update');

        $project = $this->user->assistantProject()->findOrFail($id);

        return new ProjectResource($project);
    }

    public function index()
    {
        $project = $this->user->assistantProject()->get();

        return new ProjectResourceCollection($project);
    }

    public function update(Request $request, string $projectId)
    {
        $this->updateValidate($request);

        $this->user->ensureAccess('project_delegated_update');

        $project = $this->user->assistantProject()->findOrFail($projectId);

        $project->validateStatus();

        $project->update($this->data);

        return response()->json([
            'result' => 'success'
        ], 200);
    }
}
