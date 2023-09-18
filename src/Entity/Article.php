<?php

namespace Gsales\Entity;

use Gsales\Helper\ConvertDecimal;

/** Entity for GSALES article */
class Article {

	const TABLENAME = 'articles';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this article. */
	public ?int $id = null;

	/** Article number for this article.  */
	public ?string $artno = null;

	/** EAN number of this article.  */
	public ?string $ean = null;

	/** Title of this article.  */
	public ?string $title = null;

	/** Text of the unit for this article (e.g. x, pcs. or h).  */
	public ?string $unit = null;

	/** Line item text for this article which is used and displayed on documents (eg. invoices, offers, sales,...).  */
	public ?string $pos_txt = null;

	/** Purchase price for this article.  */
	public ?float $eprice = null;

	/** Selling price for this article.  */
	public ?float $price = null;

	/** Tax rate for this article.  */
	public ?float $tax = null;

	/** Creation datetime of this article.  */
	public ?string $created = null;

	/** Custom text 1 for this article.  */
	public ?string $custom1 = null;

	/** Custom text 2 for this article.  */
	public ?string $custom2 = null;

	/** Custom text 3 for this article.  */
	public ?string $custom3 = null;

	/** Tags associated to this article. */
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
	public function getArtno()
	{
		return $this->artno;
	}

	/**
	 * @param mixed $artno
	 */
	public function setArtno($artno): void
	{
		$this->artno = $artno;
	}

	/**
	 * @return mixed
	 */
	public function getEan()
	{
		return $this->ean;
	}

	/**
	 * @param mixed $ean
	 */
	public function setEan($ean): void
	{
		$this->ean = $ean;
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
	public function getUnit()
	{
		return $this->unit;
	}

	/**
	 * @param mixed $unit
	 */
	public function setUnit($unit): void
	{
		$this->unit = $unit;
	}

	/**
	 * @return mixed
	 */
	public function getPosTxt()
	{
		return $this->pos_txt;
	}

	/**
	 * @param mixed $pos_txt
	 */
	public function setPosTxt($pos_txt): void
	{
		$this->pos_txt = $pos_txt;
	}

	/**
	 * @return mixed
	 */
	public function getEprice()
	{
		return $this->eprice;
	}

	/**
	 * @param mixed $eprice
	 */
	public function setEprice($eprice): void
	{
		$this->eprice = $eprice;
	}

	/**
	 * @return mixed
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param mixed $price
	 */
	public function setPrice($price): void
	{
		$this->price = $price;
	}

	/**
	 * @return mixed
	 */
	public function getTax()
	{
		return $this->tax;
	}

	/**
	 * @param mixed $tax
	 */
	public function setTax($tax): void
	{
		$this->tax = ConvertDecimal::convertDecimal($tax);
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
	public function getCustom1()
	{
		return $this->custom1;
	}

	/**
	 * @param mixed $custom1
	 */
	public function setCustom1($custom1): void
	{
		$this->custom1 = $custom1;
	}

	/**
	 * @return mixed
	 */
	public function getCustom2()
	{
		return $this->custom2;
	}

	/**
	 * @param mixed $custom2
	 */
	public function setCustom2($custom2): void
	{
		$this->custom2 = $custom2;
	}

	/**
	 * @return mixed
	 */
	public function getCustom3()
	{
		return $this->custom3;
	}

	/**
	 * @param mixed $custom3
	 */
	public function setCustom3($custom3): void
	{
		$this->custom3 = $custom3;
	}

	/**
	 * @return mixed
	 */
	public function getTags()
	{
		return $this->tags;
	}

	/**
	 * @param mixed $tags
	 */
	public function setTags($tags): void
	{
		$this->tags = $tags;
	}

}