<?php

namespace A4anthony\Cartavel;

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

        //$this->_registerPublishableResources();

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
            __DIR__.'/Migrations/' => database_path('migrations')
        ], 'migrations');
        include __DIR__.'/routes.php';
    }


    public function provides()
    {
        return ['cartavel'];
    }

    private function _registerPublishableResources()
    {
        $this->publishes([
            __DIR__.'/Migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
