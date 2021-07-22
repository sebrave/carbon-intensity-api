<?php

namespace Sebrave\LaravelCarbonIntensity;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sebrave\LaravelCarbonIntensity\LaravelCarbonIntensity
 */
class LaravelCarbonIntensityFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-carbon-intensity';
    }
}
