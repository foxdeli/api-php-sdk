<?php

declare(strict_types=1);

namespace Tests\Tracking;

use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\PickupPlace;
use Foxdeli\ApiPhpSdk\Model\FileInfo;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class UploadPickupPlaceImageTest extends TestCase
{
    public function testWithValidAuthorization(): void
    {
        $mock = new MockHandler([
            new Response(201, ['Content-Type' => 'application/json'], $this->getRawResponse())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        /** @var FileInfo */
        $fileInfo = $pickupPlace->uploadPickupPlaceImage('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');

        $this->assertInstanceOf(FileInfo::class, $fileInfo);
        $this->assertSame("pickup-places/22222222-2222-2222-2222-222222222222/image.png", $fileInfo->getPath());
        $this->assertSame("https://storage.sandbox.foxdeli.com/pickup-places/22222222-2222-2222-2222-222222222222/image.png", $fileInfo->getUrl());
        $this->assertSame(491291, $fileInfo->getSize());
    }

    private function getRawResponse() : string {
        return '{
            "id": "image",
            "path": "pickup-places/22222222-2222-2222-2222-222222222222/image.png",
            "url": "https://storage.sandbox.foxdeli.com/pickup-places/22222222-2222-2222-2222-222222222222/image.png",
            "mediaLink": "https://storage.sandbox.foxdeli.com/pickup-places/22222222-2222-2222-2222-222222222222/image.png",
            "contentType": "image/png",
            "size": 491291,
            "created": "2024-06-01T12:13:29.767Z",
            "updated": "2024-06-01T12:13:29.767Z"
        }';
    }
}
