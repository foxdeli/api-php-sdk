<?php

declare(strict_types=1);

namespace Tests\Tracking;

use DateInterval;
use DateTime;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Tracking;
use Foxdeli\ApiPhpSdk\Model\DeliveryStateRequest;
use Foxdeli\ApiPhpSdk\Model\Parcel;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class DeleteParcelTest extends TestCase
{
    public function testWithValidAuthorization(): void
    {
        $mock = new MockHandler([
            new Response(204, ['Content-Type' => 'application/json'], $this->getRawResponse())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $response = $tracking->deleteParcel('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222");

        $this->assertTrue($response);
    }

    private function getRawResponse() : string {
        return '';
    }
}
