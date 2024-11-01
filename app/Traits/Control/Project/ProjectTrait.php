<?php

namespace App\Traits\Control\Project;

use App\Exceptions\Control\Project\DelegatedProjectsException;
use App\Http\Controllers\Control\Role\RoleController;
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
     * @var string
     */
    protected string $userId;

    /**
     * @var string
     */
    protected string $assistantId;

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
     * Project update fields validation
     *
     * @return void
     */
    protected function updateValidate(Request $request)
    {
        $request->validate([
            'project_name' => 'string|min:5|max:50|nullable',
            'project_description' => 'string|min:5|max:100|nullable',
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

    /**
     * Define Assistant
     *
     * @return App\Models\User
     */
    public function defineAssistant(): User
    {
        $assistant = User::withCount('assistantProject')
            ->where('role_id', RoleController::getBySlug('moderator'))
            ->orderBy('assistant_project_count', 'asc')
            ->first();

        $count = $assistant->assistant_project_count;

        $this->checkLimit($count);

        return $assistant;
    }

    /**
     * Throw exception when the amount of linked projects exceeds specified number
     *
     * @return App\Exceptions\Control\Project\DelegatedProjectsException
     */
    protected function checkLimit($count, int $limit = 5)
    {
        if ($count >= $limit) {
            throw new DelegatedProjectsException($limit);
        }
    }
}
