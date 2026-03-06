# YEB DeviceAnalyzerAPI

PHP SDK for the YEB Device Analyzer API. Parse user-agent strings to detect device, OS and browser.

Works standalone (plain PHP) or with Laravel (Facade + auto-discovery).

## Requirements

- PHP 8.1+
- cURL extension
- [YEB API Key](https://yeb.to) (free tier available)

## Installation

```bash
composer require yebto/device-analyzer-api
```

## Standalone Usage

```php
use Yebto\DeviceAnalyzerAPI\DeviceAnalyzerAPI;

$api = new DeviceAnalyzerAPI(['key' => 'your-api-key']);
$result = $api->analyze('example');
```

## Laravel Usage

Add your API key to `.env`:

```
YEB_KEY_ID=your-api-key
```

Use via Facade:

```php
use DeviceAnalyzerAPI;

$result = DeviceAnalyzerAPI::analyze('example');
```

Or via dependency injection:

```php
use Yebto\DeviceAnalyzerAPI\DeviceAnalyzerAPI;

public function handle(DeviceAnalyzerAPI $api)
{
    $result = $api->analyze('example');
}
```

### Publish Config

```bash
php artisan vendor:publish --tag=yebto-device-analyzer-config
```

## Available Methods

| Method | Description |
|--------|-------------|
| `analyze($user_agent)` | Analyze a user-agent string |


All methods accept an optional `$extra` array parameter for additional API options.

## Error Handling

```php
use Yebto\ApiClient\Exceptions\ApiException;
use Yebto\ApiClient\Exceptions\AuthenticationException;
use Yebto\ApiClient\Exceptions\RateLimitException;

try {
    $result = $api->analyze('example');
} catch (AuthenticationException $e) {
    // Missing or invalid API key (401)
} catch (RateLimitException $e) {
    // Too many requests (429)
} catch (ApiException $e) {
    echo $e->getMessage();
    echo $e->getHttpCode();
}
```

## Free API Access

Register at [yeb.to](https://yeb.to) with Google OAuth to get a free API key.

## Support

- Documentation: [docs.yeb.to](https://docs.yeb.to)
- Email: support@yeb.to
- Issues: [GitHub Issues](https://github.com/yebto/device-analyzer-api/issues)

## License

MIT - NETOX Ltd.
