<?php

namespace Helium\Sts;

use Illuminate\Support\ServiceProvider;

class AliYunSTSServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom('./config/sts.php', 'sts');

        $this->app->singleton('aliyun.sts', function ($app){
            return new Sts($app['config']['sts']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['aliyun.sts'];
    }
}
