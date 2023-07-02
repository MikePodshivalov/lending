<?php

namespace App\Providers;

use App\Http\Controllers\ProjectsController\ProjectsController;
use App\Http\Controllers\ProjectsController\ProjectsControllerInterface;
use App\Http\Middleware\TxMiddleware;
use App\Repositories\ProjectsRepository\ProjectsRepository;
use App\Repositories\ProjectsRepository\ProjectsRepositoryInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindClients();
        $this->bindRepositories();
        $this->bindServices();
        $this->bindMiddlewares();
        $this->bindSingletons();
        $this->bindControllers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }

    /**
     * Регистрация клиентов для подключения к внешним сервисам
     *
     * @return void
     */
    protected function bindClients(): void
    {
        //
    }

    /**
     * Register project repositories
     *
     * @return void
     */
    protected function bindRepositories(): void
    {
        $this->app->singleton(ProjectsRepositoryInterface::class, ProjectsRepository::class);
    }

    /**
     * Register project services
     *
     * @return void
     */
    protected function bindServices(): void
    {
        //
    }

    /**
     * Register controllers
     *
     * @return void
     */
    protected function bindControllers(): void
    {
        $this->app->singleton(ProjectsControllerInterface::class, ProjectsController::class);
    }

    /**
     * Register project singletons
     *
     * @return void
     */
    protected function bindSingletons(): void
    {
//        $this->app->singleton(ApiRole::ADMIN_MANAGER_PERMISSIONS, fn() => [
//            ApiRole::READ_MANAGERS,
//            ApiRole::EDIT_MANAGERS,
//        ]);
//        $this->app->singleton(ApiRole::ADMIN_SUBDIVISION_PERMISSIONS, fn() => [
//            ApiRole::READ_SUBDIVISIONS,
//            ApiRole::EDIT_SUBDIVISIONS,
//        ]);
//        $this->app->singleton(ApiRole::ADMIN_ROOT_PERMISSIONS, fn() => [
//            ApiRole::EDIT_CHANNELS,
//            ApiRole::EDIT_ROLES,
//            ApiRole::UPLOAD_CLIENT_CONTACTS,
//            ApiRole::EDIT_AGENCY,
//            ApiRole::EDIT_AGENTS,
//            ApiRole::EDIT_GROUP_CHECKLISTS,
//            ApiRole::READ_REPLACED_WORDS,
//            ApiRole::EDIT_REPLACED_WORDS,
//        ]);
//
//        $this->app->singleton(RequestCompany::class, fn() => RCompany::makeInstance());
    }

    /**
     * Register custom middlewares
     *
     * @return void
     */
    protected function bindMiddlewares(): void
    {
        $this->registerValidators();
        $this->app->singleton('tx', TxMiddleware::class);
    }

    /**
     * Register custom validation middlewares
     *
     * @return void
     */
    protected function registerValidators(): void
    {
//        $this->app->singleton('validation.protected.authorize', fn() => new ValidationMiddleware(new AuthorizationValidator()));
//        $this->app->singleton('validation.protected.reset-password', fn() => new ValidationMiddleware(new ResetPasswordValidator()));
    }
}
