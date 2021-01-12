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
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }


    public function provides()
    {
        return ['cartavel'];
    }
}
