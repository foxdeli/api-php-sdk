<?php

declare(strict_types=1);

namespace Tests\PickupPlace;

use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\PickupPlace;
use Foxdeli\ApiPhpSdk\Model\DestinationType;
use Foxdeli\ApiPhpSdk\Model\ExceptionallyOpeningHoursRequest;
use Foxdeli\ApiPhpSdk\Model\Gps;
use Foxdeli\ApiPhpSdk\Model\LocationRequest;
use Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest;
use Foxdeli\ApiPhpSdk\Model\OpeningHoursRequest;
use Foxdeli\ApiPhpSdk\Model\Parcel;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceCreate;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse;
use Foxdeli\ApiPhpSdk\Model\RegularOpeningHoursRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class DeletePickupPlaceTest extends TestCase
{
    public function testWithValidAuthorization(): void
    {
        $mock = new MockHandler([
            new Response(204, ['Content-Type' => 'application/json'], $this->getRawResponse())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $response = $pickupPlace->deletePickupPlace("11111111-1111-1111-1111-111111111111");

        $this->assertTrue($response);
    }

    private function getRawResponse() : string {
        return '';
    }
}
