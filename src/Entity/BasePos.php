<?php

namespace Gsales\Entity;

class BasePos {

	/** Unique identifier of this line item */
	public ?int $id = null;

	/** Id of the main record this line item belongs to */
	public int $invoices_id;

	/** Quantity of the line item */
	public float $quantity = 1;

	/** Unit text of this line item */
	public string $unit;

	/** Line item text */
	public string $pos_txt;

	/** Price of this line item */
	public float $price;

	/** Buying price of this line item */
	public ?float $eprice = null;

	/** Sort number */
	public ?int $sortno = null;

	/** Discount in percent which will be substracted from the price */
	public ?float $discount = null;

	/** Tax in percent which will be added to the discounted price */
	public ?float $tax = null;

	/** Article id this line item was created from - only for statistical reasons */
	public int $article_id = 0;

	/** Is this line item a headline? */
	public int $headline = 0;

	/** Tags associated to this record */
	public ?string $tags = null;

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
	public function getInvoicesId()
	{
		return $this->invoices_id;
	}

	/**
	 * @param mixed $invoices_id
	 */
	public function setInvoicesId($invoices_id): void
	{
		$this->invoices_id = $invoices_id;
	}

	/**
	 * @return mixed
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * @param mixed $quantity
	 */
	public function setQuantity($quantity): void
	{
		$this->quantity = $quantity;
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
	public function getSortno()
	{
		return $this->sortno;
	}

	/**
	 * @param mixed $sortno
	 */
	public function setSortno($sortno): void
	{
		$this->sortno = $sortno;
	}

	/**
	 * @return mixed
	 */
	public function getDiscount()
	{
		return $this->discount;
	}

	/**
	 * @param mixed $discount
	 */
	public function setDiscount($discount): void
	{
		$this->discount = $discount;
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
		$this->tax = $tax;
	}

	/**
	 * @return mixed
	 */
	public function getArticleId()
	{
		return $this->article_id;
	}

	/**
	 * @param mixed $article_id
	 */
	public function setArticleId($article_id): void
	{
		$this->article_id = $article_id;
	}

	/**
	 * @return mixed
	 */
	public function getHeadline()
	{
		return $this->headline;
	}

	/**
	 * @param mixed $headline
	 */
	public function setHeadline($headline): void
	{
		$this->headline = $headline;
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