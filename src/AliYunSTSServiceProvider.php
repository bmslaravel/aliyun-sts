<?php

namespace Helium\Sts;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class AliYunSTSServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the service.
     *
     * @author yansongda <me@yansongda.cn>
     */
    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                './config/pay.php' => config_path('pay.php'), ],
                'laravel-pay'
            );
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('sts');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/src/config/sts.php', 'sts');

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
