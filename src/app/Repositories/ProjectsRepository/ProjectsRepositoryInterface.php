<?php

namespace App\Repositories\ProjectsRepository;

use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Интерфейс репозитория для работы с проектами
 */
interface ProjectsRepositoryInterface
{
    /**
     * Находит последние n проектов
     *
     * @param int $quantity
     *
     * @return LengthAwarePaginator
     */
    public function getLatestProjects(int $quantity): LengthAwarePaginator;

    /**
     * Удаляет проект по переданному id
     *
     * @param Project $project
     * @return bool|null
     */
    public function deleteProject(Project $project): bool|null;
}
