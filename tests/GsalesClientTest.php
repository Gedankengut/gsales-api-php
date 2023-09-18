<?php

declare(strict_types=1);

namespace Gsales\Tests;

use Http\Message\RequestMatcher\RequestMatcher;
use Laminas\Diactoros\Response;

final class GsalesClientTest extends TestCase
{
    public function testCanRequest200Response(): void
    {
        $httpClient = $this->gsalesClient()->getHttpClient();
        $response = $httpClient->get('/articles');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCanRequest201Response(): void
    {
        $this->mockClient->addResponse((new Response())->withStatus(201));
        $httpClient = $this->gsalesClient()->getHttpClient();
        $response = $httpClient->post('/articles');
        $this->assertEquals(201, $response->getStatusCode());
    }

    public function testCanHandle404s(): void
    {
        $this->mockClient->on(new RequestMatcher('404'), (new Response())->withStatus(404));
        $httpClient = $this->gsalesClient()->getHttpClient();
        $this->assertEquals(404, $httpClient->get('/404')->getStatusCode());
    }
}
