<?php

namespace Gsales\Entity;

/** Entity for GSALES sale. */

class Sale extends Base {

	const TABLENAME = 'sales';
	const PRIMARYKEYNAME = 'id';

	public $mediafinanz_file;

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
	public function getMediafinanzFile()
	{
		return $this->mediafinanz_file;
	}

	/**
	 * @param mixed $mediafinanz_file
	 */
	public function setMediafinanzFile($mediafinanz_file): void
	{
		$this->mediafinanz_file = $mediafinanz_file;
	}

}