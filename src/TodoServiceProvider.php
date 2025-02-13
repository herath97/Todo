<?php
namespace Custom\Todo;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Custom\Todo\Livewire\TodoIndex;
use Custom\Todo\Livewire\TodoCreate;

class TodoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/config/todo.php', 'todo');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Livewire::component('todo-index', TodoIndex::class);
        Livewire::component('todo-create', TodoCreate::class);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'todo');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/todo.php' => config_path('todo.php'),
            ], 'config');
            
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/todo'),
            ], 'views');
            
            $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations'),
            ], 'migrations');
            $this->publishes([
                __DIR__.'/../public' => public_path('custom/todo'),
            ], 'public');
        }

    }
}
