<?php

namespace App\Providers;

use App\Model\Project;
use App\Model\Task;
use App\Observers\TaskObserver;
use App\Observers\ProjectObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Task::observe(TaskObserver::class);
        Project::observe(ProjectObserver::class);
    }
}
