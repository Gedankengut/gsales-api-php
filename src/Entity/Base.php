<?php

namespace Gsales\Entity;

class Base {

	/** Unique identifier of this record */
	public ?int $id = null;

	/** Id of the customer this record belongs to */
	public int $customers_id = 0;

	/** Customer no */
	public ?string $customerno = null;

	/** Type of customer */
	public ?int $customer_typ=0;

	/** Company name of the customer */
	public ?string $customer_company = null;

	/** Title of the customer */
	public ?string $customer_title = null;

	/** Lastname of the customer */
	public ?string $customer_lastname = null;

	/** Firstname of the customer */
	public ?string $customer_firstname = null;

	/** Address/Street of the customer */
	public ?string $customer_address = null;

	/** Postal code of the customer */
	public ?string $customer_zip = null;

	/** City of the customer */
	public ?string $customer_city = null;

	/** Country of the customer */
	public ?string $customer_country = null;

	/** Print title, firstname, lastname in the address field */
	public ?int $print_contactperson = 0;

	/** Number of this record */
	public ?string $invoiceno = null;

	/** Status of this record */
	public ?int $status_id = 0;

	/** Datetime when the status has changed last */
	public ?string $status_date = null;

	/** Datetime when the record was created */
	public ?string $created = null;

	/** Introduction text for this record */
	public ?string $i_pre_txt = null;

	/** Appendix text for this record */
	public ?string $i_post_txt = null;

	/** Amount that has been already paid by the customer */
	public ?float $partialpayment = null;

	/** Total calculated amount (tax included) for this record. */
	public ?float $amount = 0;

	/** Total calculated net amount (tax excluded) for this record. */
	public ?float $netamount = 0;

	/** Number of line items on this record. */
	public ?int $poscount = 0;

	/** Duedate/Payable until */
	public ?string $payable = null;

	/** Id of the user who created this record */
	public ?int $user_id = null;

	/** Date of delivery */
	public ?string $deliverydate = null;

	/** Cancellation text / Reason for cancellation */
	public ?string $storno_txt = null;

	/** Id of the used currency */
	public ?int $curr_id = null;

	/** Currency symbol */
	public ?string $curr_symbol = null;

	/** Currency rate */
	public ?float $curr_rate = null;

	/** Template for the creation of the pdf file */
	public ?string $template = null;

	/** Custom text 1 */
	public ?string $custom1 = null;

	/** Custom text 2 */
	public ?string $custom2 = null;

	/** Custom text 3 */
	public ?string $custom3 = null;

	/** Custom text 4 */
	public ?string $custom4 = null;

	/** Custom text 5 */
	public ?string $custom5 = null;

	/** Tags associated to this record */
	public ?string $tags = null;

	/** Comments */
	public ?array $comments = [];

	/** Comments */
	public ?array $history = [];

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
	public function getCustomerTyp()
	{
		return $this->customer_typ;
	}

	/**
	 * @param mixed $customer_typ
	 */
	public function setCustomerTyp($customer_typ): void
	{
		$this->customer_typ = $customer_typ;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerCompany()
	{
		return $this->customer_company;
	}

	/**
	 * @param mixed $customer_company
	 */
	public function setCustomerCompany($customer_company): void
	{
		$this->customer_company = $customer_company;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerTitle()
	{
		return $this->customer_title;
	}

	/**
	 * @param mixed $customer_title
	 */
	public function setCustomerTitle($customer_title): void
	{
		$this->customer_title = $customer_title;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerLastname()
	{
		return $this->customer_lastname;
	}

	/**
	 * @param mixed $customer_lastname
	 */
	public function setCustomerLastname($customer_lastname): void
	{
		$this->customer_lastname = $customer_lastname;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerFirstname()
	{
		return $this->customer_firstname;
	}

	/**
	 * @param mixed $customer_firstname
	 */
	public function setCustomerFirstname($customer_firstname): void
	{
		$this->customer_firstname = $customer_firstname;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerAddress()
	{
		return $this->customer_address;
	}

	/**
	 * @param mixed $customer_address
	 */
	public function setCustomerAddress($customer_address): void
	{
		$this->customer_address = $customer_address;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerZip()
	{
		return $this->customer_zip;
	}

	/**
	 * @param mixed $customer_zip
	 */
	public function setCustomerZip($customer_zip): void
	{
		$this->customer_zip = $customer_zip;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerCity()
	{
		return $this->customer_city;
	}

	/**
	 * @param mixed $customer_city
	 */
	public function setCustomerCity($customer_city): void
	{
		$this->customer_city = $customer_city;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerCountry()
	{
		return $this->customer_country;
	}

	/**
	 * @param mixed $customer_country
	 */
	public function setCustomerCountry($customer_country): void
	{
		$this->customer_country = $customer_country;
	}

	/**
	 * @return mixed
	 */
	public function getPrintContactperson()
	{
		return $this->print_contactperson;
	}

	/**
	 * @param mixed $print_contactperson
	 */
	public function setPrintContactperson($print_contactperson): void
	{
		$this->print_contactperson = 0;
		if ($print_contactperson == 1 || $print_contactperson == 'on') $this->print_contactperson = 1;
	}

	/**
	 * @return mixed
	 */
	public function getInvoiceno()
	{
		return $this->invoiceno;
	}

	public function getInvoiceNoFallbackToId()
	{
		if ($this->getInvoiceno() == '') return $this->getId();
		return $this->getInvoiceno();
	}

	/**
	 * @param mixed $invoiceno
	 */
	public function setInvoiceno($invoiceno): void
	{
		$this->invoiceno = $invoiceno;
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
		if (null != $status_date && str_contains($status_date,'.')){
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
		if (null != $created && str_contains($created,'.')){
			$teile = explode('.',$created);
			if (count($teile) > 2) $this->created = $teile[2].'-'.$teile[1].'-'.$teile[0];
		}
	}

	/**
	 * @return mixed
	 */
	public function getIPreTxt()
	{
		return $this->i_pre_txt;
	}

	/**
	 * @param mixed $i_pre_txt
	 */
	public function setIPreTxt($i_pre_txt): void
	{
		$this->i_pre_txt = $i_pre_txt;
	}

	/**
	 * @return mixed
	 */
	public function getIPostTxt()
	{
		return $this->i_post_txt;
	}

	/**
	 * @param mixed $i_post_txt
	 */
	public function setIPostTxt($i_post_txt): void
	{
		$this->i_post_txt = $i_post_txt;
	}

	/**
	 * @return mixed
	 */
	public function getPartialpayment()
	{
		return $this->partialpayment;
	}

	/**
	 * @param mixed $partialpayment
	 */
	public function setPartialpayment($partialpayment): void
	{
		$this->partialpayment = $partialpayment;
	}

	/**
	 * @return mixed
	 */
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * @param mixed $amount
	 */
	public function setAmount($amount): void
	{
		$this->amount = $amount;
	}

	/**
	 * @return mixed
	 */
	public function getNetamount()
	{
		return $this->netamount;
	}

	/**
	 * @param mixed $netamount
	 */
	public function setNetamount($netamount): void
	{
		$this->netamount = $netamount;
	}

	/**
	 * @return mixed
	 */
	public function getPoscount()
	{
		return $this->poscount;
	}

	/**
	 * @param mixed $poscount
	 */
	public function setPoscount($poscount): void
	{
		$this->poscount = $poscount;
	}

	/**
	 * @return mixed
	 */
	public function getPayable()
	{
		return $this->payable;
	}

	/**
	 * @param mixed $payable
	 */
	public function setPayable($payable): void
	{
		$this->payable = $payable;
		// de to en
		if (null != $payable && str_contains($payable,'.')){
			$teile = explode('.',$payable);
			if (count($teile) > 2) $this->payable = $teile[2].'-'.$teile[1].'-'.$teile[0];
		}
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
	public function getDeliverydate()
	{
		return $this->deliverydate;
	}

	/**
	 * @param mixed $deliverydate
	 */
	public function setDeliverydate($deliverydate): void
	{
		$this->deliverydate = $deliverydate;
		// de to en
		if (null != $deliverydate && str_contains($deliverydate,'.')) {
			$teile = explode('.',$deliverydate);
			if (count($teile) > 2) $this->deliverydate = $teile[2].'-'.$teile[1].'-'.$teile[0];
		}
	}

	/**
	 * @return mixed
	 */
	public function getStornoTxt()
	{
		return $this->storno_txt;
	}

	/**
	 * @param mixed $storno_txt
	 */
	public function setStornoTxt($storno_txt): void
	{
		$this->storno_txt = $storno_txt;
	}

	/**
	 * @return mixed
	 */
	public function getCurrId()
	{
		return $this->curr_id;
	}

	/**
	 * @param mixed $curr_id
	 */
	public function setCurrId($curr_id): void
	{
		$this->curr_id = $curr_id;
	}

	/**
	 * @return mixed
	 */
	public function getCurrSymbol()
	{
		return $this->curr_symbol;
	}

	/**
	 * @param mixed $curr_symbol
	 */
	public function setCurrSymbol($curr_symbol): void
	{
		$this->curr_symbol = $curr_symbol;
	}

	/**
	 * @return mixed
	 */
	public function getCurrRate()
	{
		return $this->curr_rate;
	}

	/**
	 * @param mixed $curr_rate
	 */
	public function setCurrRate($curr_rate): void
	{
		$this->curr_rate = $curr_rate;
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
	public function getCustom4()
	{
		return $this->custom4;
	}

	/**
	 * @param mixed $custom4
	 */
	public function setCustom4($custom4): void
	{
		$this->custom4 = $custom4;
	}

	/**
	 * @return mixed
	 */
	public function getCustom5()
	{
		return $this->custom5;
	}

	/**
	 * @param mixed $custom5
	 */
	public function setCustom5($custom5): void
	{
		$this->custom5 = $custom5;
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