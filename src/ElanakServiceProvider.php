<?php

namespace Morpheusadam\Elanak;

use Illuminate\Support\ServiceProvider;

class ElanakServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('elanak', function ($app) {
            return new Elanak();
        });
    }

    /**
     * Bootstrap any application services.
    
     * @return void
     */
    public function boot()
    {
        // Here you can bootstrap your package services.
    }
}
