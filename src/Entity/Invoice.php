<?php

namespace Gsales\Entity;

/** Entity for GSALES invoices. */


class Invoice extends Base {

	const TABLENAME = 'invoices';
	const PRIMARYKEYNAME = 'id';

	/** Identifier of mediafinanz process */
	public $mediafinanz_file;

	/** If and which zugferd version to use */
	public $i_zugferd;

	/** zugferd leitweg id */
	public $i_zugferd_leitwegid;

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

	/**
	 * @return mixed
	 */
	public function getIZugferd()
	{
		return $this->i_zugferd;
	}

	/**
	 * @param mixed $i_zugferd
	 */
	public function setIZugferd($i_zugferd): void
	{
		$this->i_zugferd = $i_zugferd;
	}

	/**
	 * @return mixed
	 */
	public function getIZugferdLeitwegid()
	{
		return $this->i_zugferd_leitwegid;
	}

	/**
	 * @param mixed $i_zugferd_leitwegid
	 */
	public function setIZugferdLeitwegid($i_zugferd_leitwegid): void
	{
		$this->i_zugferd_leitwegid = $i_zugferd_leitwegid;
	}

}