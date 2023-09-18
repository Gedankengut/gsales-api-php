<?php

namespace Gsales\Entity;

/** Entity for GSALES letter */

class Letter {

	const TABLENAME = 'letters';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this letter. */
	public ?int $id = null;

	/** Customers id of this letter. */
	public ?int $customers_id = null;

	/** Customer no of this letter. */
	public ?string $customerno = null;

	/** Internal name of this letter. */
	public ?string $internal_name = null;

	/** Recipient text of this letter. */
	public ?string $recipient_txt = null;

	/** Status id of this letter. */
	public ?int $status_id = 0;

	/** Column1 text of this letter. */
	public ?string $col1 = null;

	/** Column2 text of this letter. */
	public ?string $col2 = null;

	/** Column3 text of this letter. */
	public ?string $col3 = null;

	/** Column4 text of this letter. */
	public ?string $col4 = null;

	/** Datetime status was last updated. */
	public ?string $status_date = null;

	/** Datetime letter was created. */
	public string $created;

	/** Letter content text. */
	public ?string $l_txt = null;

	/** User id who created this letter. */
	public ?int $user_id = null;

	/** PDF Template to use for this letter. */
	public ?string $template = 'tpl.def_letter.php';

	/** Tags associated to this letter. */
	public ?string $tags = null;

	/** Comments */
	public ?array $comments = [];

	/** History */
	public ?array $history = [];


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
	public function getCustomersId()
	{
		return $this->customers_id;
	}

	/**
	 * @param mixed $customers_id
	 */
	public function setCustomersId($customers_id): void
	{
		$this->customers_id = $customers_id;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerno()
	{
		return $this->customerno;
	}

	/**
	 * @param mixed $customerno
	 */
	public function setCustomerno($customerno): void
	{
		$this->customerno = $customerno;
	}

	/**
	 * @return mixed
	 */
	public function getInternalName()
	{
		return $this->internal_name;
	}

	/**
	 * @param mixed $internal_name
	 */
	public function setInternalName($internal_name): void
	{
		$this->internal_name = $internal_name;
	}

	/**
	 * @return mixed
	 */
	public function getRecipientTxt()
	{
		return $this->recipient_txt;
	}

	/**
	 * @param mixed $recipient_txt
	 */
	public function setRecipientTxt($recipient_txt): void
	{
		$this->recipient_txt = $recipient_txt;
	}

	/**
	 * @return mixed
	 */
	public function getStatusId()
	{
		return $this->status_id;
	}

	/**
	 * @param mixed $status_id
	 */
	public function setStatusId($status_id): void
	{
		$this->status_id = $status_id;
	}

	/**
	 * @return mixed
	 */
	public function getCol1()
	{
		return $this->col1;
	}

	/**
	 * @param mixed $col1
	 */
	public function setCol1($col1): void
	{
		$this->col1 = $col1;
	}

	/**
	 * @return mixed
	 */
	public function getCol2()
	{
		return $this->col2;
	}

	/**
	 * @param mixed $col2
	 */
	public function setCol2($col2): void
	{
		$this->col2 = $col2;
	}

	/**
	 * @return mixed
	 */
	public function getCol3()
	{
		return $this->col3;
	}

	/**
	 * @param mixed $col3
	 */
	public function setCol3($col3): void
	{
		$this->col3 = $col3;
	}

	/**
	 * @return mixed
	 */
	public function getCol4()
	{
		return $this->col4;
	}

	/**
	 * @param mixed $col4
	 */
	public function setCol4($col4): void
	{
		$this->col4 = $col4;
	}

	/**
	 * @return mixed
	 */
	public function getStatusDate()
	{
		return $this->status_date;
	}

	/**
	 * @param mixed $status_date
	 */
	public function setStatusDate($status_date): void
	{
		$this->status_date = $status_date;
		// de to en
		if (null != $status_date && str_contains($status_date,'.')) {
			$teile = explode('.',$status_date);
			if (count($teile) > 2) $this->status_date = $teile[2].'-'.$teile[1].'-'.$teile[0];
		}
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
		// de to en
		if (null != $created && str_contains($created,'.')) {
			$teile = explode('.',$created);
			if (count($teile) > 2) $this->created = $teile[2].'-'.$teile[1].'-'.$teile[0];
		}
	}

	/**
	 * @return mixed
	 */
	public function getLTxt()
	{
		return $this->l_txt;
	}

	/**
	 * @param mixed $l_txt
	 */
	public function setLTxt($l_txt): void
	{
		if (null == $l_txt) $this->l_txt = $l_txt;
		else $this->l_txt = str_replace(array('&#039;'), array('\''), $l_txt);
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
	public function getTemplate()
	{
		return $this->template;
	}

	/**
	 * @param mixed $template
	 */
	public function setTemplate($template): void
	{
		$this->template = $template;
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

	/**
	 * @return array|null
	 */
	public function getComments(): ?array
	{
		return $this->comments;
	}

	/**
	 * @param array|null $comments
	 */
	public function setComments(?array $comments): void
	{
		$this->comments = $comments;
	}

	/**
	 * @return array|null
	 */
	public function getHistory(): ?array
	{
		return $this->history;
	}

	/**
	 * @param array|null $history
	 */
	public function setHistory(?array $history): void
	{
		$this->history = $history;
	}

}