<?php

namespace Yebto\DeviceAnalyzerAPI;

use Illuminate\Support\ServiceProvider;

class DeviceAnalyzerAPIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/yebto-device-analyzer.php', 'yebto-device-analyzer');

        $this->app->singleton('yebto-device-analyzer', function () {
            return new DeviceAnalyzerAPI(config('yebto-device-analyzer'));
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/yebto-device-analyzer.php' => config_path('yebto-device-analyzer.php'),
        ], 'yebto-device-analyzer-config');
    }
}
