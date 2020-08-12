<?php

namespace Janmoo\Crudwire;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Janmoo\Crudwire\Components\Counter;
use Janmoo\Crudwire\Components\Crud;
use Janmoo\Crudwire\Components\Show;
use Janmoo\Crudwire\Components\Edit;
use Janmoo\Crudwire\Components\Create;

class CrudwireServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'janmoo');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'crudwire');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        Livewire::component('crudwire::counter', Counter::class);
        Livewire::component('crudwire::crud', Crud::class);
        Livewire::component('crudwire::edit', Edit::class);
        Livewire::component('crudwire::show', Show::class);
        Livewire::component('crudwire::create', Create::class);

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/crudwire.php', 'crudwire');

        // Register the service the package provides.
        $this->app->singleton('crudwire', function ($app) {
            return new Crudwire;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['crudwire'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/crudwire.php' => config_path('crudwire.php'),
        ], 'crudwire.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/janmoo'),
        ], 'crudwire.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/janmoo'),
        ], 'crudwire.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/janmoo'),
        ], 'crudwire.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
