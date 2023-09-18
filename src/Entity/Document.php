<?php

namespace Gsales\Entity;

/** Entity for GSALES documents which is used to attach files to records. */

class Document {

	const TABLENAME = 'documents';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this document. */
	public ?int $id = null;

	/** User id who created this document. */
	public ?int $user_id = null;

	/** Username who created this document. */
	public ?string $username = null;

	/** Comment for this document. */
	public ?string $comment = null;

	/** Date when this document was created. */
	public string $created;

	/** GSALES section this document belongs to. */
	public string $sub = 'subcustomer';

	/** Record id this document belongs to. */
	public int $recordid = 0;

	/** Original filename of this document. */
	public ?string $original_filename = null;

	/** Base64 encoded content of the file. */
	public ?string $file = null;

	/** Title of this document. */
	public ?string $title = null;

	/** Description of this document. */
	public ?string $description = null;

	/** Flag if document is public for customer. */
	public int $public = 0;

	/** Base64 encoded content of the file. */
	public ?string $file_content_base64 = null;

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
		$this->recordid = $recordid;
	}

	/**
	 * @return mixed
	 */
	public function getOriginalFilename()
	{
		return $this->original_filename;
	}

	/**
	 * @param mixed $original_filename
	 */
	public function setOriginalFilename($original_filename): void
	{
		$this->original_filename = $original_filename;
	}

	/**
	 * @return mixed
	 */
	public function getFile()
	{
		return $this->file;
	}

	/**
	 * @param mixed $file
	 */
	public function setFile($file): void
	{
		$this->file = $file;
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
	public function getPublic()
	{
		return $this->public;
	}

	/**
	 * @param mixed $public
	 */
	public function setPublic($public): void
	{
		$this->public = 0;
		if ($public == 1 || $public == 'on') $this->public = 1;
	}

	/**
	 * @return string
	 */
	public function getFileContentBase64()
	{
		return $this->file_content_base64;
	}

	/**
	 * @param string $file_content_base64
	 */
	public function setFileContentBase64(string $file_content_base64): void
	{
		$this->file_content_base64 = $file_content_base64;
	}

}