<?php

namespace NickKlein\Kanban;

use Illuminate\Support\ServiceProvider;
use NickKlein\Kanban\Commands\RunSeederCommand;

class KanbanServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Register migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');

        if (config('kanban.routes', false)) {
            $this->loadRoutesFrom(__DIR__ . '/Routes/auth.php');
        }

        /*$this->commands([*/
        /*    RunSeederCommand::class,*/
        /*]);*/
        $this->publishes([
            __DIR__.'/../config/kanban.php' => config_path('kanban.php'),
        ], 'kanban-config');
    }
}

