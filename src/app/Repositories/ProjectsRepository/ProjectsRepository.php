<?php

namespace App\Repositories\ProjectsRepository;

use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Реализация интерфейса репозитория для работы с проектами
 */
class ProjectsRepository implements ProjectsRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getLatestProjects(int $quantity): LengthAwarePaginator
    {
        return Project::latest()->paginate($quantity);
    }

    /**
     * @inheritdoc
     */
    public function deleteProject(Project $project): bool|null
    {
        return $project->delete();
    }
}
