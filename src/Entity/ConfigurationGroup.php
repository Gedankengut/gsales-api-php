<?php

namespace Gsales\Entity;

/** Entity for GSALES configuration */
class ConfigurationGroup {

	const TABLENAME = 'configuration_groups';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this configuration group. */
	public $id;

	/** Title of this configuration group. */
	public $title;

	/** Description/hint of this configuration group. */
	public $descr;

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
		$this->{self::PRIMARYKEYNAME} = intval($value);
	}

	public function getPrimaryKey()
	{
		return $this->{self::PRIMARYKEYNAME};
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
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle($title): void
	{
		$this->title = $title;
	}

	/**
	 * @return mixed
	 */
	public function getDescr()
	{
		return $this->descr;
	}

	/**
	 * @param mixed $descr
	 */
	public function setDescr($descr): void
	{
		$this->descr = $descr;
	}

}