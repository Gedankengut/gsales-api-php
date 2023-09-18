<?php

namespace Gsales\Entity;

/** Entity for GSALES history */

class History {

	const TABLENAME = 'history';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this history entry. */
	public ?int $id = null;

	/** Identifier of the user responsible for this history entry. */
	public int $user_id;

	/** Username of the user responsible for this history entry. */
	public ?string $username = null;

	/** Text for this history entry.  */
	public string $comment;

	/** Creation datetime of this history entry.  */
	public string $created;

	/** GSALES section this history entry belongs to.  */
	public string $sub;

	/** Record id in the given section / resource this history entry belongs to.  */
	public int $recordid;

	/** Flags if this history entry is marked with a star / selected as a favorite comment.  */
	public ?int $stared = null;

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
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * @param mixed $comment
	 */
	public function setComment($comment): void
	{
		$this->comment = $comment;
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
	public function getSub()
	{
		return $this->sub;
	}

	/**
	 * @param mixed $sub
	 */
	public function setSub($sub): void
	{
		$this->sub = $sub;
	}

	/**
	 * @return mixed
	 */
	public function getRecordid()
	{
		return $this->recordid;
	}

	/**
	 * @param mixed $recordid
	 */
	public function setRecordid($recordid): void
	{
		$this->recordid = intval($recordid);
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

}