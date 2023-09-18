<?php

namespace Gsales\Entity;

use Gsales\Helper\ConvertDecimal;

/** Entity for GSALES currency */

class Currency {

	const TABLENAME = 'currencies';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this currency. */
	public ?int $id = null;

	/** Name for this currency  */
	public ?string $name = null;

	/** Symbol for this currency.  */
	public ?string $symbol = null;

	/** Exchange rate for this currency.  */
	public ?float $rate = 1;

	/** Flag if there should be an blank between the symbol and the number/amount.  */
	public ?int $spacing = null;

	/** Flag if the currency symbol should by displayed before the number/amount.  */
	public ?int $before_number = null;

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
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): void
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getSymbol()
	{
		return $this->symbol;
	}

	/**
	 * @param mixed $symbol
	 */
	public function setSymbol($symbol): void
	{
		$this->symbol = $symbol;
	}

	/**
	 * @return mixed
	 */
	public function getRate()
	{
		return $this->rate;
	}

	/**
	 * @param mixed $rate
	 */
	public function setRate($rate): void
	{
		$this->rate = ConvertDecimal::convertDecimal($rate);
	}

	/**
	 * @return mixed
	 */
	public function getSpacing()
	{
		return $this->spacing;
	}

	/**
	 * @param mixed $spacing
	 */
	public function setSpacing($spacing): void
	{
		$this->spacing = intval($spacing);
	}

	/**
	 * @return mixed
	 */
	public function getBeforeNumber()
	{
		return $this->before_number;
	}

	/**
	 * @param mixed $before_number
	 */
	public function setBeforeNumber($before_number): void
	{
		$this->before_number = intval($before_number);
	}

}