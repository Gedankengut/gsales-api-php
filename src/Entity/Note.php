<?php

namespace Gsales\Entity;

/** Entity for GSALES note */

class Note {

	const TABLENAME = 'notes';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this note. */
	public ?int $id = null;

	/** Identifier of the user for this note. */
	public ?int $user_id = null;

	/** Username of the user for this note. */
	public ?string $username = null;

	/** Text for this note.  */
	public $note;

	/** Creation datetime of this note.  */
	public $created;

	/** Flags if this note is marked with a star / selected as a favorite comment.  */
	public ?int $stared = null;

	/** Show note only to a particular user id.  */
	public ?int $show_user_id = null;

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
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * @param mixed $user_id
	 */
	public function setUserId($user_id): void
	{
		$this->user_id = $user_id;
	}

	/**
	 * @return mixed
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername($username): void
	{
		$this->username = $username;
	}

	/**
	 * @return mixed
	 */
	public function getNote()
	{
		return $this->note;
	}

	/**
	 * @param mixed $note
	 */
	public function setNote($note): void
	{
		$this->note = $note;
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
	 * @return mixed
	 */
	public function getStared()
	{
		return $this->stared;
	}

	/**
	 * @param mixed $stared
	 */
	public function setStared($stared): void
	{
		$this->stared = $stared;
	}

	/**
	 * @return mixed
	 */
	public function getShowUserId()
	{
		return $this->show_user_id;
	}

	/**
	 * @param mixed $show_user_id
	 */
	public function setShowUserId($show_user_id): void
	{
		$this->show_user_id = $show_user_id;
	}

}