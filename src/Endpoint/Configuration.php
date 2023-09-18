<?php

declare(strict_types=1);

namespace Gsales\Endpoint;

use Gsales\Client;
use Gsales\Entity\Configuration as Entity;
use Gsales\Filter\Filter;
use Gsales\HttpClient\Message\ResponseMediator;

final class Configuration
{

	private Client $gsales;

	private $uri = '/configurations';

	public function __construct(Client $gsales)
	{
		$this->gsales = $gsales;
	}

	public function get(Filter $filterParams = null): array|null
	{
		if ($filterParams == null) $filterParams = new Filter();
		return ResponseMediator::getContent($this->gsales->getHttpClient()->get($this->uri.$filterParams->getParameterAsString()));
	}

	public function count(Filter $filterParams = null): int|null
	{
		if ($filterParams == null) $filterParams = new Filter();
		return ResponseMediator::getCount($this->gsales->getHttpClient()->get($this->uri.$filterParams->getParameterAsString()));
	}

	public function getById($id): Entity|null
	{
		return ResponseMediator::getContent($this->gsales->getHttpClient()->get($this->uri.'/'.$id));
	}

	public function update(Entity $entity, array $arrRequestBody): Entity|null
	{
		return $this->updateById($entity->getId(),$arrRequestBody);
	}

	public function updateById($id, array $arrRequestBody): Entity|null
	{
		return ResponseMediator::getContent($this->gsales->getHttpClient()->patch($this->uri.'/'.$id,['Content-Type'=>'application/merge-patch+json'], json_encode($arrRequestBody)));
	}

}