<?php

declare(strict_types=1);

namespace Gsales\Filter;

use Gsales\Exception\FilterException;

final class Filter
{
	private $page;
	private $filter = [];
	private $filterLogic;
	private $orderBy;
	private $orderDir;

	public function __construct(int $page = null, array $filter = null, string $filterLogic = null, string $orderBy = null, string $orderDir = null)
	{
		$this->setPage($page);
		$this->setFilter($filter);
		$this->setFilterLogic($filterLogic);
		$this->setOrderBy($orderBy);
		$this->setOrderDir($orderDir);
	}

	public function getParameterAsString()
	{
		return '?page='.$this->getPage().$this->getFilterAsString().'&filterLogic='.$this->getFilterLogic().'&order='.$this->getOrderBy().'&orderDir='.$this->getOrderDir();
	}

	private function getFilterAsString()
	{
		$strFilter = '';
		if (count($this->getFilter()) < 1) return $strFilter;
		foreach($this->getFilter() as $filter) $strFilter .= '&filter[]='.$filter;
		return $strFilter;
	}

	/**
	 * @return int
	 */
	private function getPage(): int
	{
		return $this->page;
	}

	/**
	 * @param int $page
	 */
	private function setPage(?int $page): void
	{
		if (null == $page) $page = 1;
		$this->page = $page;
	}

	/**
	 * @return array|null
	 */
	private function getFilter(): ?array
	{
		return $this->filter;
	}

	/**
	 * @param array|null $filter
	 */
	private function setFilter(?array $filter): void
	{
		if (null == $filter) return;
		$arrAvailableFilter = [
			'like', '@',
			'notlike', '!@',
			'bigger', '>',
			'biggerOrEqual', '>=',
			'is', '=',
			'isnot', '!=',
			'smallerOrEqual', '<=',
			'smaller', '<'
		];
		foreach($filter as $item)
		{
			$arrParts = explode(' ',$item);
			if (!array_key_exists(1,$arrParts)) throw new FilterException('invalid filter string given. try "id is 5" or "amount smaller 10".');
			if (false === array_search($arrParts[1],$arrAvailableFilter)) throw new FilterException('filter has to be one of the following strings: '.implode(' ',$arrAvailableFilter). '. "'.$arrParts[1].'" given.');
			$this->filter[] = $item;
		}
	}

	/**
	 * @return string
	 */
	private function getFilterLogic(): string
	{
		return $this->filterLogic;
	}

	/**
	 * @param string $filterLogic
	 */
	private function setFilterLogic(?string $filterLogic): void
	{
		if (null == $filterLogic) $filterLogic = 'and';
		if ($filterLogic != 'and' && $filterLogic !='or') throw new FilterException('filterLogic must be and or or. '.$filterLogic.' given.');
		$this->filterLogic = $filterLogic;
	}

	/**
	 * @return string|null
	 */
	private function getOrderBy(): ?string
	{
		return $this->orderBy;
	}

	/**
	 * @param string|null $orderBy
	 */
	private function setOrderBy(?string $orderBy): void
	{
		$this->orderBy = $orderBy;
	}

	/**
	 * @return string
	 */
	private function getOrderDir(): string
	{
		return $this->orderDir;
	}

	/**
	 * @param string $orderDir
	 */
	private function setOrderDir(?string $orderDir): void
	{
		if (null == $orderDir) $orderDir = 'asc';
		if ($orderDir != 'asc' && $orderDir !='desc') throw new FilterException('orderDir must be asc or desc. '.$orderDir.' given.');
		$this->orderDir = $orderDir;
	}


}