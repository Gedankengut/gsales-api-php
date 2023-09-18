<?php

namespace Gsales\Entity;

/** Entity for GSALES comment */

class Comment {

	const TABLENAME = 'comments';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this article. */
	public ?int $id = null;

	/** Identifier of the user for this comment. */
	public ?int $user_id = null;

	/** Username of the user for this comment. */
	public ?string $username = null;

	/** Comment text for this comment.  */
	public string $comment;

	/** Creation datetime of this comment.  */
	public string $created;

	/** GSALES section this comment belongs to.  */
	public string $sub;

	/** Record id in the given section / resource this comment belongs to.  */
	public int $recordid;

	/** Flags if this comment is marked as deleted.  */
	public ?int $deleted = 0;

	/** Datetime when this comment was marked as deleted.  */
	public ?string $deletedon = null;

	/** Information which username has marked this comment as deleted.  */
	public ?string $deleteuser = null;

	/** Flags if this comment is marked with a star / selected as a favorite comment.  */
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
	public function getDeleted()
	{
		return $this->deleted;
	}

	/**
	 * @param mixed $deleted
	 */
	public function setDeleted($deleted): void
	{
		$this->deleted = $deleted;
	}

	/**
	 * @return mixed
	 */
	public function getDeletedon()
	{
		return $this->deletedon;
	}

	/**
	 * @param mixed $deletedon
	 */
	public function setDeletedon($deletedon): void
	{
		$this->deletedon = $deletedon;
	}

	/**
	 * @return mixed
	 */
	public function getDeleteuser()
	{
		return $this->deleteuser;
	}

	/**
	 * @param mixed $deleteuser
	 */
	public function setDeleteuser($deleteuser): void
	{
		$this->deleteuser = $deleteuser;
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