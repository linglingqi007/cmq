<?php

namespace Tiger\CMQ;

use Illuminate\Support\ServiceProvider;

class CMQServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/cmq.php';

        if (function_exists('config_path')) {
            $publishPath = config_path('cmq.php');
        } else {
            $publishPath = base_path('config/cmq.php');
        }

        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/cmq.php';

        $this->mergeConfigFrom($configPath, 'cmq');

        $this->app['cmq'] = $this->app->share(function ($app) {

            return new CMQClient($app['config']->get('cmq'), []);
        });
    }

    public function provides()
    {
        return ['cmq'];
    }
}
