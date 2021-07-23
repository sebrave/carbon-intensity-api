<?php

namespace Sebrave\LaravelCarbonIntensity\Tests;

use Illuminate\Support\Facades\Http;
use Sebrave\LaravelCarbonIntensity\LaravelCarbonIntensity;

class LaravelCarbonIntensityTest extends TestCase
{
    /** @test */
    public function it_calls_the_intensity_endpoint()
    {
        Http::fake([
            'https://api.carbonintensity.org.uk/intensity' =>
                Http::response(
                    json_decode(
                        '{"data": [{"from": "2021-07-23T07:00Z", "to": "2021-07-23T07:30Z", "intensity": {"forecast": 251, "actual": 248, "index": "moderate"}}]}',
                        true
                    )
                )
        ]);

        $api = new LaravelCarbonIntensity();
        $this->assertInstanceOf(LaravelCarbonIntensity::class, $api);

        $response = $api->get();

        $this->assertNotNull($response);
        $this->assertIsArray($response);
        $this->assertNotEmpty($response);
    }

    /** @test */
    public function it_calls_the_postcodes_endpoint()
    {
        Http::fake([
            'https://api.carbonintensity.org.uk/regional/postcode/EC1V' =>
                Http::response(
                    json_decode(
                        '{"data":[{"regionid":12,"dnoregion":"UKPN London","shortname":"London","postcode":"EC1V","data":[{"from":"2021-07-23T07:00Z","to":"2021-07-23T07:30Z","intensity":{"forecast":107,"index":"low"},"generationmix":[{"fuel":"biomass","perc":0},{"fuel":"coal","perc":0},{"fuel":"imports","perc":72.6},{"fuel":"gas","perc":20.2},{"fuel":"nuclear","perc":0},{"fuel":"other","perc":0},{"fuel":"hydro","perc":0.3},{"fuel":"solar","perc":3},{"fuel":"wind","perc":4}]}]}]}',
                        true
                    )
                )
        ]);

        $api = new LaravelCarbonIntensity();
        $this->assertInstanceOf(LaravelCarbonIntensity::class, $api);

        $response = $api->getByPostcode('EC1V');

        $this->assertNotNull($response);
        $this->assertIsArray($response);
        $this->assertNotEmpty($response);
    }

    /** @test */
    public function it_calls_the_facotrs_breakdown_endpoint()
    {
        Http::fake([
            'https://api.carbonintensity.org.uk/intensity/factors' =>
                Http::response(
                    json_decode(
                        '{"data": [{"Biomass": 120, "Coal": 937, "Dutch Imports": 474, "French Imports": 53, "Gas (Combined Cycle)": 394, "Gas (Open Cycle)": 651, "Hydro": 0, "Irish Imports": 458, "Nuclear": 0, "Oil": 935, "Other": 300, "Pumped Storage": 0, "Solar": 0, "Wind": 0 } ]}',
                        true
                    )
                )
        ]);

        $api = new LaravelCarbonIntensity();
        $this->assertInstanceOf(LaravelCarbonIntensity::class, $api);

        $response = $api->getBreakdown();

        $this->assertNotNull($response);
        $this->assertIsArray($response);
        $this->assertNotEmpty($response);
    }
}
