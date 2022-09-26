<?php

namespace web36\EFatura;


use Illuminate\Support\ServiceProvider as BaseServiceProvider;


class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     */
    public function register()
    {

        $this->app->singleton("Signature", function ($app) {
            $config = config('efatura');

            if (is_null($config)) {
                throw InvalidConfiguration::configurationNotSet();
            }

            return new Signature();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'efatura');
        
    }
}