<?php

namespace Gsales\Entity;

/** Entity for GSALES letter template */

class LetterTemplate {

	const TABLENAME = 'letter_templates';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this letter template. */
	public ?int $id = null;

	/** Name of this letter template.  */
	public ?string $name = null;

	/** Content text of this letter template.  */
	public ?string $txt = null;

	/** Creation datetime of this letter template.  */
	public string $created;

	/** Tags associated to this letter template. */
	public ?string $tags = null;

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
	public function getTxt()
	{
		return $this->txt;
	}

	/**
	 * @param mixed $txt
	 */
	public function setTxt($txt): void
	{
		$this->txt = $txt;
	}

	/**
	 * @return mixed
	 */
	public function getCreated()
	{
		return $this->created;
	}

	/**
	 * @param mixed $created
	 */
	public function setCreated($created): void
	{
		$this->created = $created;
	}

	/**
	 * @return string|null
	 */
	public function getTags(): ?string
	{
		return $this->tags;
	}

	/**
	 * @param string|null $tags
	 */
	public function setTags(?string $tags): void
	{
		$this->tags = $tags;
	}

}