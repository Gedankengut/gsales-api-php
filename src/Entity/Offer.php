<?php

namespace Gsales\Entity;

/** Entity for GSALES offers. */

class Offer extends Base {

	const TABLENAME = 'offers';
	const PRIMARYKEYNAME = 'id';

	/** Date until the offer will be valid */
	public ?string $validuntil = null;

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
	public function getValiduntil()
	{
		return $this->validuntil;
	}

	/**
	 * @param mixed $validuntil
	 */
	public function setValiduntil($validuntil): void
	{
		$this->validuntil = $validuntil;
		// de to en
		if (null != $validuntil && str_contains($validuntil,'.')) {
			$teile = explode('.',$validuntil);
			if (count($teile) > 2) $this->validuntil = $teile[2].'-'.$teile[1].'-'.$teile[0];
		}
	}

}