<?php

namespace Gsales\Entity;

/** Entity for GSALES refund line items. */

class SalePos extends BasePos {

	const TABLENAME = 'sales_pos';
	const PRIMARYKEYNAME = 'id';

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

}