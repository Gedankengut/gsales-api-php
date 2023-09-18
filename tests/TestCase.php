<?php

declare(strict_types=1);

namespace Gsales\Tests;

use Gsales\ClientBuilder;
use Gsales\Options;
use Gsales\Client as GsalesClient;
use Http\Mock\Client;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Client $mockClient;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockClient = new Client();
    }

    protected function gsalesClient(): GsalesClient
    {
        return new GsalesClient(new Options([
            'client_builder' => new ClientBuilder($this->mockClient),
        ]));
    }
}
