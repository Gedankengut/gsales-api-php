<?php

declare(strict_types=1);

namespace Gsales\HttpClient\Message;

use Gsales\Entity\EntityMapper;
use Gsales\Exception\ResponseException;
use Gsales\Exception\UnhandledStatusCodeException;
use Psr\Http\Message\ResponseInterface;

final class ResponseMediator
{

    public static function getContent(ResponseInterface $response)
    {
		// GET, POST, PATCH
	    if ($response->getStatusCode() == '200' || $response->getStatusCode() == '201')
		{
			$entityMapper = new EntityMapper();
			return $entityMapper->mapFromResponse($response->getBody()->getContents());
	    }

	    // DELETE
	    if ($response->getStatusCode() == '204') return true;

	    // not found
	    if ($response->getStatusCode() == '404') return null; // record not found, return null

		// throw exception for unhandled status codes
		throw new UnhandledStatusCodeException($response->getStatusCode().': '.$response->getBody()->getContents());
    }

	public static function getCount(ResponseInterface $response)
	{

		// GET collection
		if ($response->getStatusCode() == '200')
		{
			$arrResponse = json_decode($response->getBody()->getContents(), true);
			if (false == isset($arrResponse['hydra:totalItems'])) throw new ResponseException('hydra:totalItems not found');
			return $arrResponse['hydra:totalItems'];
		}

		// not found
		if ($response->getStatusCode() == '404') return 0;

		// throw exception for unhandled status codes
		throw new UnhandledStatusCodeException($response->getStatusCode().': '.$response->getBody()->getContents());
	}

}