<?php

namespace App\Http\Controllers\ProjectsController;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Repositories\ProjectsRepository\ProjectsRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectsController extends Controller implements ProjectsControllerInterface
{
    protected ProjectsRepositoryInterface $projectsRepository;

    /**
     * Конструктор контроллера
     *
     * @param ProjectsRepositoryInterface $projectsRepository
     */
    public function __construct(ProjectsRepositoryInterface $projectsRepository)
    {
        $this->projectsRepository = $projectsRepository;
    }

    /**
     * @inheritdoc
     */
    public function getProjectsList(Request $request): View
    {
        $projects = $this->projectsRepository->getLatestProjects(30);

        return view('project.index', compact('projects'));
    }

    /**
     * @inheritdoc
     */
    public function createProject(Request $request): View
    {
        // TODO: Implement createProject() method.
    }

    /**
     * @inheritdoc
     */
    public function changeProject(Request $request): View
    {
        // TODO: Implement changeProject() method.
    }

    /**
     * @inheritdoc
     */
    public function deleteProject(Request $request, Project $project): RedirectResponse
    {
        $this->projectsRepository->deleteProject($project);

        return redirect()->back();
    }
}
