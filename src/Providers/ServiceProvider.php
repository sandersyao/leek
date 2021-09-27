<?php
namespace Leek\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * 启动时回调 所有注册完成后执行
     */
    public function boot()
    {
        $this->ifRunningInConsole();
        // $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->bootConfig();
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->bootRelations();
    }

    /**
     * 服务注册
     */
    public function register()
    {
        parent::register();
    }

    /**
     * 命令行注册
     */
    protected function ifRunningInConsole()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
            ]);
        }
    }

    /**
     * 动态设置配置
     */
    protected function bootConfig()
    {
        not_cached_config_set(function() {
            return  [];
        });
    }

    /**
     * 注册模型关系
     */
    protected function bootRelations()
    {
    }
}
