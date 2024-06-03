<?php

declare(strict_types=1);

namespace Tests\Tracking;

use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Tracking;
use Foxdeli\ApiPhpSdk\Model\FileInfo;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class UploadOrderInvoiceTest extends TestCase
{
    public function testWithValidAuthorization(): void
    {
        $mock = new MockHandler([
            new Response(201, ['Content-Type' => 'application/json'], $this->getRawResponse())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );
        /** @var FileInfo */
        $fileInfo = $tracking->uploadOrderInvoice('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');

        $this->assertInstanceOf(FileInfo::class, $fileInfo);
        $this->assertSame("invoices/22222222-2222-2222-2222-222222222222/foxdeli-intro.en-03-04-2023.pdf", $fileInfo->getPath());
        $this->assertSame("https://storage.sandbox.foxdeli.com/invoices/22222222-2222-2222-2222-222222222222/foxdeli-intro.en-03-04-2023.pdf", $fileInfo->getUrl());
        $this->assertSame(759500, $fileInfo->getSize());
    }

    private function getRawResponse() : string {
        return '{
            "path": "invoices/22222222-2222-2222-2222-222222222222/foxdeli-intro.en-03-04-2023.pdf",
            "url": "https://storage.sandbox.foxdeli.com/invoices/22222222-2222-2222-2222-222222222222/foxdeli-intro.en-03-04-2023.pdf",
            "contentType": "application/pdf",
            "size": 759500,
            "created": "2024-05-27T19:47:06.298Z",
            "updated": "2024-05-27T19:47:06.298Z"
        }';
    }
}
