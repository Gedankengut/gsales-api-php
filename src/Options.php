<?php

declare(strict_types=1);

namespace Gsales;

use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

final class Options
{
    private array $options;

    public function __construct(array $options = null)
    {
		$defaultOptions = ['client_builder' => new ClientBuilder(), 'uri_factory' => Psr17FactoryDiscovery::findUriFactory(), 'api_uri' => 'http://localhost/api'];
        $this->options = array_merge($defaultOptions, $options);
    }

    public function getClientBuilder(): ClientBuilder
    {
        return $this->options['client_builder'];
    }

    public function getUriFactory(): UriFactoryInterface
    {
        return $this->options['uri_factory'];
    }

    public function getUri(): UriInterface
    {
        return $this->getUriFactory()->createUri($this->options['api_uri']);
    }
}