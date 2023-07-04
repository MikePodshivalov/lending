<?php

namespace App\Http\Controllers\ProjectsController;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Описывает интерфейс контроллера для работы с проектами
 */
interface ProjectsControllerInterface
{
    /**
     * Получение списка проектов.
     *
     * @param Request $request
     *
     * @return View
     */
    public function getProjectsList(Request $request): View;

    /**
     * Создание нового проекта
     * @param Request $request
     *
     * @return View
     */
    public function createProject(Request $request): View;

    /**
     * Изменение проекта по данным запроса пользователя
     *
     * @param Request $request
     *
     * @return View
     */
    public function changeProject(Request $request): View;

    /**
     * Удаление проекта по данным запроса пользователя
     *
     * @param Request $request
     *
     * @return View
     */
    public function deleteProject(Request $request, Project $project): RedirectResponse;
}
