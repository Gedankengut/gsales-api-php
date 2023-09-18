<?php

namespace Gsales\Entity;

/** Entity for GSALES offer line items. */

class OfferPos extends BasePos {

	const TABLENAME = 'offers_pos';
	const PRIMARYKEYNAME = 'id';

	public int $optional = 0;

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
	 * @return int
	 */
	public function getOptional(): int
	{
		return $this->optional;
	}

	/**
	 * @param int $optional
	 */
	public function setOptional(int $optional): void
	{
		$this->optional = $optional;
	}

}