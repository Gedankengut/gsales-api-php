<?php

namespace Gsales\Entity;

/** Entity for GSALES tax */

class Tax {

	const TABLENAME = 'taxes';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this tax. */
	public ?int $id = null;

	/** Tax rate */
	public ?float $tax = 0;

	/** Flag if recordset is default tax rate. */
	public ?int $def = null;

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
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id): void
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getTax()
	{
		return $this->tax;
	}

	/**
	 * @param mixed $tax
	 */
	public function setTax($tax): void
	{
		$this->tax = $tax;
	}

	/**
	 * @return mixed
	 */
	public function getDef()
	{
		return $this->def;
	}

	/**
	 * @param mixed $def
	 */
	public function setDef($def): void
	{
		$this->def = $def;
	}

}