<?php

namespace Gsales\Entity;

/** Entity for GSALES configuration */

class Configuration {

	const TABLENAME = 'configuration';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this configuration. */
	public $id;

	/** Title of this configuration. */
	public $title;

	/** Value of this configuration. */
	public $value;

	/** Description text for this configuration. */
	public $description;

	/** Group/Section of this configuration. */
	public $group_id;

	/** Form type of this configuration. */
	public $form_type;

	/** Form validation of this configuration. */
	public $form_check;

	/** Sorting order of this configuration. */
	public $sort;

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
		$this->setId($value);
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
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param mixed $value
	 */
	public function setValue($value): void
	{
		$this->value = $value;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription($description): void
	{
		$this->description = $description;
	}

	/**
	 * @return mixed
	 */
	public function getGroupId()
	{
		return $this->group_id;
	}

	/**
	 * @param mixed $group_id
	 */
	public function setGroupId($group_id): void
	{
		$this->group_id = $group_id;
	}

	/**
	 * @return mixed
	 */
	public function getFormType()
	{
		return $this->form_type;
	}

	/**
	 * @param mixed $form_type
	 */
	public function setFormType($form_type): void
	{
		$this->form_type = $form_type;
	}

	/**
	 * @return mixed
	 */
	public function getFormCheck()
	{
		return $this->form_check;
	}

	/**
	 * @param mixed $form_check
	 */
	public function setFormCheck($form_check): void
	{
		$this->form_check = $form_check;
	}

	/**
	 * @return mixed
	 */
	public function getSort()
	{
		return $this->sort;
	}

	/**
	 * @param mixed $sort
	 */
	public function setSort($sort): void
	{
		$this->sort = $sort;
	}

}