<?php

declare(strict_types=1);

namespace Gsales\Endpoint;

use Gsales\Client;
use Gsales\Entity\Delivery as Entity;
use Gsales\Filter\Filter;
use Gsales\HttpClient\Message\ResponseMediator;

final class Delivery
{

	private Client $gsales;

	private $uri = '/deliveries';

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

	public function create(array $arrRequestBody): Entity
	{
		return ResponseMediator::getContent($this->gsales->getHttpClient()->post($this->uri,[], json_encode($arrRequestBody)));
	}

	public function update(Entity $entity, array $arrRequestBody): Entity|null
	{
		return $this->updateById($entity->getId(),$arrRequestBody);
	}

	public function updateById($id, array $arrRequestBody): Entity|null
	{
		return ResponseMediator::getContent($this->gsales->getHttpClient()->patch($this->uri.'/'.$id,['Content-Type'=>'application/merge-patch+json'], json_encode($arrRequestBody)));
	}

	public function delete(Entity $entity): bool|null
	{
		return $this->deleteById($entity->getId());
	}

	public function deleteById(int $id): bool|null
	{
		return ResponseMediator::getContent($this->gsales->getHttpClient()->delete($this->uri.'/'.$id));
	}

}