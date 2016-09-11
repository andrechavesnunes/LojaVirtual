<?php

namespace CodeProject\Providers;

use Illuminate\Support\ServiceProvider;

class CodeProjectRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    public function register()
    {
        $this->app->bind(\CodeProject\Repositories\ClientRepository::Class
            ,\CodeProject\Repositories\ClientRepositoryEloquent::Class);
        $this->app->bind(\CodeProject\Repositories\ProjectRepository::class
            ,\CodeProject\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\CodeProject\Repositories\ProjectsNoteRepository::class
            ,\CodeProject\Repositories\ProjectsNoteRepositoryEloquent::class);

    }
}
