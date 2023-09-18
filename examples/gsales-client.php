<?php

use Gsales\ClientBuilder;
use Gsales\Options;
use Gsales\Client;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;

require_once __DIR__ . '/../vendor/autoload.php';

$clientBuilder = new ClientBuilder();
$clientBuilder->addPlugin(
	new HeaderDefaultsPlugin([
		'Authorization' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'    // REST API Schlüssel (Enable REST API and obtain key from: GSALES 3 > Administration > API > REST)
	]
));

$clientOptions = new Options([
    'client_builder' => $clientBuilder,
	'api_uri' => 'https://mydomain.de/gsales/api'         // REST API Endpunkt (Enable REST API and obtain uri from: GSALES 3 > Administration > API > REST)
]);



$gsales = new Client($clientOptions);

// All documented endpoints of the REST API are available in this PHP Client.
// See Enable REST API and get documentation url from: GSALES 3 > Administration > API > REST > interaktive Dokumentation / UI
// eg. $gsales->articles(), $gsales->attachements(), $gsales->comments, ...


// Below are some examples how to interact with the GSALES 3 REST API and this Client:

// get all articles (gsales api paginates results, without any filter the api clients requests always page 1 of the resultset)
dump($gsales->articles()->get());

// get count of all articles
dump($gsales->articles()->count());

// get page 2 of the resultset
$filter = new \Gsales\Filter\Filter(2);
dump($gsales->articles()->get($filter));

// get specific article by id
dump($gsales->articles()->getById(50));

// get only articles where price is bigger 4 and tax is 19 and title contains gsales, order descending by created date (for more performance use id desc)
$filter = new \Gsales\Filter\Filter(1, ['price bigger 4', 'title like gsales', 'tax is 19'],'and','created','desc');
dump($gsales->articles()->get($filter));
dump($gsales->articles()->count($filter)); // get total count of filtered results

// the following examples are demonstrating how to create, edit and delete resources (for this reason they are commented out)
// please be careful with the following examples in production environments

	// create an article
	#dump($gsales->articles()->create(['artno'=>'G1', 'title'=>'GSALES-PHP', 'price'=>4.99, 'tax'=>19]));

	// delete an article by id
	#dump($gsales->articles()->deleteById(50));

	// delete an article by entity
	#$articleentity = $gsales->articles()->getById(50);
	#dump($gsales->articles()->delete($articleentity));

	// update an article by entity
	#$articleentity = $gsales->articles()->getById(35);
	#dump($gsales->articles()->update($articleentity,['artno'=>'G1a', 'title'=>'GSALES-PHPa', 'price'=>5.99]));

	// update an article by id
	#dump($gsales->articles()->updateById(35,['artno'=>'G1a', 'title'=>'GSALES-PHPa', 'price'=>6.99]));
