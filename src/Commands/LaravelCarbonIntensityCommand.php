<?php

namespace Sebrave\LaravelCarbonIntensity\Commands;

use Illuminate\Console\Command;

class LaravelCarbonIntensityCommand extends Command
{
    public $signature = 'laravel-carbon-intensity';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
