<?php

namespace Yebto\DeviceAnalyzerAPI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array analyze(string $user_agent, array $extra = [])
 */
class DeviceAnalyzerAPI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'yebto-device-analyzer';
    }
}
