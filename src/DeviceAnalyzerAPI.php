<?php

namespace Yebto\DeviceAnalyzerAPI;

use Yebto\ApiClient\YebtoClient;

class DeviceAnalyzerAPI extends YebtoClient
{
    protected function module(): string
    {
        return 'device-analyze';
    }

    protected function defaults(): array
    {
        return [
            'base_url' => 'https://api.yeb.to/v1',
            'key'      => null,
            'curl'     => [
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
                CURLOPT_USERAGENT      => 'yebto-device-analyzer-api-php',
            ],
        ];
    }

    /**
     * Analyze a user-agent string
     */
    public function analyze(string $user_agent, array $extra = []): array
    {
        return $this->post('', array_merge(compact('user_agent'), $extra));
    }
}
