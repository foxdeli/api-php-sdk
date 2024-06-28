<?php

declare(strict_types=1);

namespace Tests\Tracking;

use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Model\FileInfo;
use Foxdeli\ApiPhpSdk\PickupPlace;
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

    private function getRawResponse(): string
    {
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

    public function testWith400Response(): void
    {
        $mock = new MockHandler([
            new Response(400, ['Content-Type' => 'application/problem+json'], $this->getRawError400Response())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage('Bad Request');

        $pickupPlace->uploadPickupPlaceImage('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');
    }

    public function testWith401Response(): void
    {
        $mock = new MockHandler([
            new Response(401, ['Content-Type' => 'application/problem+json'], $this->getRawError401Response())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(401);
        $this->expectExceptionMessage('The Token has expired on 2024-01-02T03:04:05Z.');

        $pickupPlace->uploadPickupPlaceImage('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');
    }

    public function testWith404Response(): void
    {
        $mock = new MockHandler([
            new Response(404, ['Content-Type' => 'application/problem+json'], $this->getRawError404Response())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Pickup place not found.');

        $pickupPlace->uploadPickupPlaceImage('33333333-3333-3333-3333-333333333333', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');
    }

    public function testWith415Response(): void
    {
        $mock = new MockHandler([
            new Response(415, ['Content-Type' => 'application/problem+json'], $this->getRawError415Response())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(415);
        $this->expectExceptionMessage('Unsupported Media Type');

        $pickupPlace->uploadPickupPlaceImage('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');
    }

    private function getRawError400Response(): string
    {
        return '{
            "type": "about:blank",
            "title": "Constraint violation",
            "status": 400,
            "detail": "uploadPickupPlaceImage.eshopId: must be a valid UUID",
            "instance": "/pickup-place/api/v1/pickup-place/22222222-2222-2222-2222-222222222222abc/image"
            "violations": {
                "uploadPickupPlaceImage.eshopId": "must be a valid UUID"
            }
        }';
    }

    private function getRawError401Response(): string
    {
        return '{
            "type": "about:blank",
            "title": "The Token has expired on 2024-01-02T03:04:05Z.",
            "status": 401,
            "detail": "The Token has expired on 2024-01-02T03:04:05Z.",
            "instance": "/pickup-place/api/v1/pickup-place/22222222-2222-2222-2222-222222222222/image"
        }';
    }

    private function getRawError404Response(): string
    {
        return '{
            "type": "about:blank",
            "title": "Pickup place not found.",
            "status": 404,
            "detail": "Pickup place with the following identification was not found. UUID: 33333333-3333-3333-3333-333333333333.",
            "instance": "/pickup-place/api/v1/pickup-place/33333333-3333-3333-3333-333333333333",
            "id": "33333333-3333-3333-3333-333333333333"
        }';
    }

    private function getRawError415Response(): string
    {
        return '{
            "type": "about:blank",
            "title": "Unsupported Media Type",
            "status": 415,
            "detail": "Content-Type \'text/plain;charset=UTF-8\' is not supported.",
            "instance": "/pickup-place/api/v1/pickup-place/22222222-2222-2222-2222-222222222222"
        }';
    }
}
