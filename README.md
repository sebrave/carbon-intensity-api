# Wrapper for UK National Grid Carbon Intensity API

This Laravel package helps you work with the UK National Grid's Carbon Intensity Forecasting API.

You can read more about the API at their website: https://carbonintensity.org.uk


## Installation

You can install the package via composer:

```bash
composer require sebrave/laravel-carbon-intensity
```

## Usage

```php
$api = new \Sebrave\LaravelCarbonIntensity\LaravelCarbonIntensity();
$api->get();
```

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
