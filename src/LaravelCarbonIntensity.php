<?php

namespace Sebrave\LaravelCarbonIntensity;

use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Http;

class LaravelCarbonIntensity
{
    public string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.carbonintensity.org.uk';
    }

    public function get()
    {
        return $this->makeRequest('/intensity');
    }

    public function getByDate(?CarbonInterface $date = null)
    {
        $url = '/intensity/date/';

        if ($date) {
            $url .= $date->toDateString();
        }

        return $this->makeRequest($url);
    }

    public function getByPostcode(string $postCode)
    {
        return $this->makeRequest('/regional/postcode/' . $postCode);
    }

    public function getBreakdown()
    {
        return $this->makeRequest('/intensity/factors');
    }

    private function makeRequest(string $url)
    {
        return Http::accept('application/json')
            ->get($this->baseUrl . $url)
            ->json();
    }
}
