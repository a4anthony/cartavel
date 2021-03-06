<?php

namespace A4anthony\Cartavel;

use A4anthony\Cartavel\Commands\Seed;
use Illuminate\Support\ServiceProvider;

class CartavelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'cartavel',
            function () {
                return new Cartavel;
            }
        );

        if ($this->app->runningInConsole()) {
            $this->commands(
                [
                    Seed::class,
                ]
            );
            $this->registerPublishableResources();
        }

        $this->loadHelpers();

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->publishes([
            __DIR__ . '/Migrations/' => database_path('migrations')
        ], 'migrations');
        include __DIR__ . '/routes.php';
    }


    public function provides()
    {
        return ['cartavel'];
    }


    protected function loadHelpers()
    {
        foreach (glob(__DIR__ . '/Helpers/*.php') as $filename) {
            include_once $filename;
        }
    }

    public function registerPublishableResources()
    {
        $publishablePath = dirname(__DIR__);
        $publishable = [
            'config' => [
                "{$publishablePath}/src/config/cartavel.php" => config_path('cartavel.php'),
            ],
            'seeds' => [
                "{$publishablePath}/src/DummyDatabase/seeds/" => database_path('seeders'),
                "{$publishablePath}/src/DummyDatabase/dummy_seeds/" => database_path('seeders'),
            ],
        ];

        foreach ($publishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }
}
