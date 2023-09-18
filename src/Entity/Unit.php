<?php

namespace Gsales\Entity;


/** Entity for GSALES unit */

class Unit {

	const TABLENAME = 'units';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this unit. */
	public ?int $id = null;

	/** Description for this unit.  */
	public ?string $unit = null;

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
	public function getUnit()
	{
		return $this->unit;
	}

	/**
	 * @param mixed $unit
	 */
	public function setUnit($unit): void
	{
		$this->unit = $unit;
	}

}