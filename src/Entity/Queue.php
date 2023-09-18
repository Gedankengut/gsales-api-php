<?php

namespace Gsales\Entity;

use Gsales\Class\gs_calc;
use Gsales\Helper\ConvertDecimal;

/** Entity for GSALES queue line item */

class Queue {

	const TABLENAME = 'queue';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this queue line item. */
	public ?int $id = null;

	/** Id of the customer this line item is queued for. */
	public ?int $customers_id = null;

	/** Quantity  */
	public int $quantity = 1;

	/** Unit  */
	public string $unit;

	/** Position text of this line item.  */
	public string $pos_txt;

	/** Unit price of the line item.  */
	public ?float $price = null;

	/** Purchase price of the line item  */
	public ?float $eprice = null;

	/** Discount in percent  */
	public ?float $discount = null;

	/** Tax rate of this line item  */
	public float $tax = 0;

	/** Id of the used GSALES article.  */
	public ?int $article_id = null;

	/** Creation datetime of this queue item.  */
	public string $created;

	/** Total position price of this queued line item.  */
	public ?float $info_price_total = null;

	/** Total position net price of this queued line item.  */
	public ?float $info_price_net = null;

	/** Id of the GSALES contract which generated this queue item. */
	public ?int $contracts_id = null;

	/** Approval status of this line item.  */
	public int $approval = 0;

	/** Order of sort when adding this line item with other items to an invoice.  */
	public ?int $sortno = null;

	/** Customer data which is referenced by the field customer_id  */
	private $customer;

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
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * @param mixed $quantity
	 */
	public function setQuantity($quantity): void
	{
		$this->quantity = floatval(ConvertDecimal::convertDecimal($quantity));
		$this->calcAndSetInfoFields();
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
		$this->price = floatval(ConvertDecimal::convertDecimal($price));
		$this->calcAndSetInfoFields();
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
		$this->eprice = floatval(ConvertDecimal::convertDecimal($eprice));
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
		$this->discount = floatval(ConvertDecimal::convertDecimal($discount));
		$this->calcAndSetInfoFields();
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
		$this->tax = floatval(ConvertDecimal::convertDecimal($tax));
		$this->calcAndSetInfoFields();
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
	public function getInfoPriceTotal()
	{
		return $this->info_price_total;
	}

	/**
	 * @param mixed $info_price_total
	 */
	public function setInfoPriceTotal($info_price_total): void
	{
		$this->info_price_total = $info_price_total;
	}

	/**
	 * @return mixed
	 */
	public function getInfoPriceNet()
	{
		return $this->info_price_net;
	}

	/**
	 * @param mixed $info_price_net
	 */
	public function setInfoPriceNet($info_price_net): void
	{
		$this->info_price_net = $info_price_net;
	}

	/**
	 * @return mixed
	 */
	public function getContractsId()
	{
		return $this->contracts_id;
	}

	/**
	 * @param mixed $contracts_id
	 */
	public function setContractsId($contracts_id): void
	{
		$this->contracts_id = $contracts_id;
	}

	/**
	 * @return mixed
	 */
	public function getApproval()
	{
		return $this->approval;
	}

	/**
	 * @param mixed $approval
	 */
	public function setApproval($approval): void
	{
		$this->approval = $approval;
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
	 * @return Customer
	 */
	public function getCustomer()
	{
		return $this->customer;
	}

	/**
	 * @param Customer $customer
	 */
	public function setCustomer($customer): void
	{
		$this->customer = $customer;
	}

	public function calcAndSetInfoFields()
	{
		$total = $this->getQuantity() * $this->getPrice();
		$objCalc = new gs_calc();
		$valueDiscount = $objCalc->getValueOfPercent($total, $this->getDiscount());
		$total -= $valueDiscount;
		$valueTax = $objCalc->getValueOfPercent($total, $this->getTax());
		$total_net = $total;
		$total += $objCalc->kfmRound($valueTax,3);
		$this->setInfoPriceTotal($total);
		$this->setInfoPriceNet($total_net);
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