<?php

namespace Sebrave\LaravelCarbonIntensity;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Sebrave\LaravelCarbonIntensity\Commands\LaravelCarbonIntensityCommand;

class LaravelCarbonIntensityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-carbon-intensity')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-carbon-intensity_table')
            ->hasCommand(LaravelCarbonIntensityCommand::class);
    }
}
