<?php

namespace Gsales\Entity;

/** Entity for GSALES contract line items. */

class ContractPos extends BasePos {

	const TABLENAME = 'contracts_pos';
	const PRIMARYKEYNAME = 'id';

	public int $not_per_interval = 0;

	/**
	 * @return string
	 */
	public function getTableName(): string
	{
		return self::TABLENAME;
	}

	/**
	 * @return string
	 */
	public function getPrimaryKeyName(): string
	{
		return self::PRIMARYKEYNAME;
	}

	public function setPrimaryKey($value)
	{
		$this->setId(intval($value));
	}

	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * @return mixed
	 */
	public function getNotPerInterval()
	{
		return $this->not_per_interval;
	}

	/**
	 * @param mixed $not_per_interval
	 */
	public function setNotPerInterval($not_per_interval): void
	{
		$this->not_per_interval = $not_per_interval;
	}

}