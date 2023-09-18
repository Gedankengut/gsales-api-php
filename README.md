# GSALES 3 REST API PHP Client Library using PSR-17 and PSR-18

The GSALES PHP library provides convenient and easy access to the GSALES 3 REST API from applications written in the PHP language.

It includes a pre-defined set of classes for API resources and entities that makes it fast forward for developers to interact with GSALES 3.

## Requirements

PHP 8 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require gedankengut/gsales-api-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once 'vendor/autoload.php';
```

## Getting Started

Simple usage looks like:

```php
<?php
require_once 'vendor/autoload.php';

$clientBuilder = new \Gsales\ClientBuilder();
$clientBuilder->addPlugin(new \Http\Client\Common\Plugin\HeaderDefaultsPlugin(['Authorization' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx']));
$clientOptions = new \Gsales\Options(['client_builder' => $clientBuilder,'api_uri' => 'https://mydomain.de/gsales3/api']);
$gsales = new \Gsales\Client($clientOptions);

var_dump($gsales->articles()->get());
```

For more examples how to use the Client Library in detail see `examples/gsales-client.php` file.
