<?php

namespace Gsales\Entity;

/** Entity for GSALES attachement which is used by the mailspool component. The e in attachement is for legacy and backward compatibility reasons. */

class Attachement {

	const TABLENAME = 'attachements';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this article. */
	public ?int $id = null;

	/** Bas64 encoded file content of the attachment.  */
	public string $file;

	/** Filename of the attachment.  */
	public string $filename;

	/** Creation datetime of this attachment.  */
	public string $created;

	/** The id of the recordset this attachment belongs to.  */
	public int $recordset_id;

	/** Filesize in bytes of the attachment.  */
	public int $filesize;

	/** MIME Type of this attachment.  */
	public string $mime;

	/** The section this attachment belongs to. Usually "spool_mails".   */
	public string $section = 'spool_mails';

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
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId(int $id): void
	{
		$this->id = $id;
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
	public function getFilename()
	{
		return $this->filename;
	}

	/**
	 * @param mixed $filename
	 */
	public function setFilename($filename): void
	{
		$this->filename = $filename;
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
	public function getRecordsetId()
	{
		return $this->recordset_id;
	}

	/**
	 * @param mixed $recordset_id
	 */
	public function setRecordsetId($recordset_id): void
	{
		$this->recordset_id = $recordset_id;
	}

	/**
	 * @return mixed
	 */
	public function getFilesize()
	{
		return $this->filesize;
	}

	/**
	 * @param mixed $filesize
	 */
	public function setFilesize($filesize): void
	{
		$this->filesize = $filesize;
	}

	/**
	 * @return mixed
	 */
	public function getMime()
	{
		return $this->mime;
	}

	/**
	 * @param mixed $mime
	 */
	public function setMime($mime): void
	{
		$this->mime = $mime;
	}

	/**
	 * @return string
	 */
	public function getSection(): string
	{
		return $this->section;
	}

	/**
	 * @param string $section
	 */
	public function setSection(string $section): void
	{
		$this->section = $section;
	}

}