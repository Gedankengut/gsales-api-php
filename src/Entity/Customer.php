<?php

namespace Gsales\Entity;

use Gsales\Helper\CamelCaps;
use Gsales\Helper\DateDe2EnWithoutDateCheck;
use Gsales\Helper\NumberDe2En;
use Gsales\Helper\RemoveSpaces;
use Gsales\Helper\UppercaseAndRemoveUmlaut;
use Gsales\Class\gs_sendplan;

/** Entity for GSALES customer */

class Customer {

	const TABLENAME = 'customers';
	const PRIMARYKEYNAME = 'id';

	/** Unique identifier of this customer. */
	public ?int $id = null;
	public ?string $customerno = null;
	public int $typ = 1;
	public int $status_id = 0;
	public string $created;
	public int $user_id;
	public ?string $company = null;
	public ?string $title = null;
	public ?string $firstname = null;
	public ?string $lastname = null;
	public int $print_contactperson = 0;
	public ?string $address = null;
	public ?string $zip = null;
	public ?string $city = null;
	public ?string $country = null;
	public ?string $taxnumber = null;
	public int $salestaxfree = 0;
	public ?string $phone = null;
	public ?string $cellular = null;
	public ?string $fax = null;
	public ?string $email = null;
	public ?string $homepage = null;

	public ?string $birthdate = null;

	public ?string $bank_account_no = null;

	public ?string $bank_code = null;

	public ?string $bank_name = null;

	public ?string $bank_account_owner = null;

	public ?string $bank_iban = null;

	public ?string $bank_bic = null;

	public ?string $sepa_deb_sig_date = null;

	public ?string $sepa_ref = null;

	public int $mail_invoices = 0;

	public int $mail_paymreminders = 0;

	public int $glob_discount = 1;

	public ?int $discount = 0;

	public int $glob_o_pre_txt = 1;

	public ?string $o_pre_txt = null;

	public int $glob_o_post_txt = 1;

	public ?string $o_post_txt = null;

	public int $glob_o_payable = 1;

	public int $o_payable = 0;

	public int $glob_o_template = 1;

	public ?string $o_template = null;

	public int $glob_i_pre_txt = 1;

	public ?string $i_pre_txt = null;

	public int $glob_i_post_txt = 1;

	public ?string $i_post_txt = null;

	public int $glob_i_payable = 1;

	public int $i_payable = 0;

	public int $glob_i_template = 1;

	public ?string $i_template = null;

	public int $glob_r_pre_txt = 1;

	public ?string $r_pre_txt = null;

	public int $glob_r_post_txt = 1;

	public ?string $r_post_txt = null;

	public int $glob_r_payable = 1;

	public int $r_payable = 0;

	public int $glob_r_template = 1;

	public ?string $r_template = null;

	public int $glob_s_pre_txt = 1;

	public ?string $s_pre_txt = null;

	public int $glob_s_post_txt = 1;

	public ?string $s_post_txt = null;

	public int $glob_s_template = 1;

	public ?string $s_template = null;

	public int $glob_d_pre_txt = 1;

	public ?string $d_pre_txt = null;

	public int $glob_d_post_txt = 1;

	public ?string $d_post_txt = null;

	public int $glob_d_template = 1;

	public ?string $d_template = null;

	public int $glob_i_zugferd = 1;

	public ?string $i_zugferd = null;

	public ?string $i_zugferd_leitwegid = null;

	public ?string $customer_text = null;

	public int $glob_interval = 0;

	public int $minterval = 0;

	public ?string $start = null;

	public ?string $nextaction = null;

	public int $dtaus = 0;

	public int $nodunning = 0;

	public ?string $custom1 = null;

	public ?string $custom2 = null;

	public ?string $custom3 = null;

	public ?string $custom4 = null;

	public ?string $custom5 = null;

	public int $glob_dunning_term_info = 1;

	public ?int $dunning_term_info = 0;

	public int $glob_dunning_term_1 = 1;

	public ?int $dunning_term_1 = 0;

	public int $glob_dunning_term_2 = 1;

	public ?int $dunning_term_2 = 0;

	public int $glob_o_plan = 1;

	public int $glob_i_plan = 1;

	public int $glob_m_plan = 1;

	public int $glob_r_plan = 1;
	public int $glob_l_plan = 1;

	public int $glob_s_plan = 1;

	public int $glob_d_plan = 1;

	public int $mailformat = 0;

	public int $frontend_active = 0 ;

	public ?string $frontend_password = null;

	public ?string $frontend_passwordlost = null;

	public ?string $proposed_changes = null;

	public int $currency = 0;

	/** Tags associated to this customer. */
	public ?string $tags = null;

	/** Comments */
	public ?array $comments = [];

	/** History */
	public ?array $history = [];

	private $currencyName = 'Standard';

	// damit die felder es nicht in die felder des sql query builders schaffen sind sie als private gekennzeichnet
	private $o_plan;
	private $o_plan_details;
	private $i_plan;
	private $i_plan_details;
	private $m_plan;
	private $m_plan_details;
	private $r_plan;
	private $r_plan_details;
	private $l_plan;
	private $l_plan_details;
	private $s_plan;
	private $s_plan_details;
	private $d_plan;
	private $d_plan_details;


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


	public function afterEntityLoad($ref_core)
	{
		if ($this->getGlobIPreTxt() == 1) $this->setIPreTxt($ref_core->cfg->v('invoice_pre_txt'));
		if ($this->getGlobIPostTxt() == 1) {
			if ($this->getDtaus() == 1) $this->setIPostTxt($ref_core->cfg->v('invoice_post_txt_dtaus'));
			else $this->setIPostTxt($ref_core->cfg->v('invoice_post_txt'));
		}
		if ($this->getGlobIPayable() == 1) $this->setIPayable($ref_core->cfg->v('invoice_paypable'));
		if ($this->getGlobITemplate() == 1) $this->setITemplate($ref_core->cfg->v('invoice_template'));
		if ($this->getGlobIZugferd() == 1) $this->setIZugferd($ref_core->cfg->v('pdf_invoice_zugferd_schema'));

		if ($this->getGlobOPreTxt() == 1) $this->setOPreTxt($ref_core->cfg->v('offer_pre_txt'));
		if ($this->getGlobOPostTxt() == 1) $this->setOPostTxt($ref_core->cfg->v('offer_post_txt'));
		if ($this->getGlobOPayable() == 1) $this->setOPayable($ref_core->cfg->v('offer_paypable'));
		if ($this->getGlobOTemplate() == 1) $this->setOTemplate($ref_core->cfg->v('offer_template'));

		if ($this->getGlobRPreTxt() == 1) $this->setRPreTxt($ref_core->cfg->v('refund_pre_txt'));
		if ($this->getGlobRPostTxt() == 1) $this->setRPostTxt($ref_core->cfg->v('refund_post_txt'));
		if ($this->getGlobRPayable() == 1) $this->setRPayable($ref_core->cfg->v('refund_paypable'));
		if ($this->getGlobRTemplate() == 1) $this->setRTemplate($ref_core->cfg->v('refund_template'));

		if ($this->getGlobSPreTxt() == 1) $this->setSPreTxt($ref_core->cfg->v('sale_pre_txt'));
		if ($this->getGlobSPostTxt() == 1) $this->setSPostTxt($ref_core->cfg->v('sale_post_txt'));
		if ($this->getGlobSTemplate() == 1) $this->setSTemplate($ref_core->cfg->v('sale_template'));

		if ($this->getGlobDPreTxt() == 1) $this->setDPreTxt($ref_core->cfg->v('delivery_pre_txt'));
		if ($this->getGlobDPostTxt() == 1) $this->setDPostTxt($ref_core->cfg->v('delivery_post_txt'));
		if ($this->getGlobDTemplate() == 1) $this->setDTemplate($ref_core->cfg->v('delivery_template'));

		if ($this->getGlobDiscount() == 1) $this->setDiscount($ref_core->cfg->v('discount'));

		if ($this->getGlobDunningTermInfo() == 1) $this->setDunningTermInfo($ref_core->cfg->v('dunning_term_info'));
		if ($this->getGlobDunningTerm1() == 1) $this->setDunningTerm1($ref_core->cfg->v('dunning_term_1'));
		if ($this->getGlobDunningTerm2() == 1) $this->setDunningTerm2($ref_core->cfg->v('dunning_term_2'));

		$objSend = new gs_sendplan($ref_core);

		if ($this->getGlobOPlan()  == 1) $this->setOPlan($objSend->getActionForCustomer(0,'suboffer',false));
		else $this->setOPlan($objSend->getActionForCustomer($this->getId(),'suboffer',false));
		$this->setOPlanDetails($objSend->getActionDetailsByArray($this->getOPlan()));

		if ($this->getGlobIPlan()  == 1) $this->setIPlan($objSend->getActionForCustomer(0,'subinvoice',false));
		else $this->setIPlan($objSend->getActionForCustomer($this->getId(),'subinvoice',false));
		$this->setIPlanDetails($objSend->getActionDetailsByArray($this->getIPlan()));

		if ($this->getGlobMPlan()  == 1) $this->setMPlan($objSend->getActionForCustomer(0,'dunning',false));
		else $this->setMPlan($objSend->getActionForCustomer($this->getId(),'dunning',false));
		$this->setMPlanDetails($objSend->getActionDetailsByArray($this->getMPlan()));

		if ($this->getGlobRPlan()  == 1) $this->setRPlan($objSend->getActionForCustomer(0,'subrefund',false));
		else $this->setRPlan($objSend->getActionForCustomer($this->getId(),'subrefund',false));
		$this->setRPlanDetails($objSend->getActionDetailsByArray($this->getRPlan()));

		if ($this->getGlobLPlan()  == 1) $this->setLPlan($objSend->getActionForCustomer(0,'subletter',false));
		else $this->setLPlan($objSend->getActionForCustomer($this->getId(),'subletter',false));
		$this->setLPlanDetails($objSend->getActionDetailsByArray($this->getLPlan()));

		if ($this->getGlobSPlan()  == 1) $this->setSPlan($objSend->getActionForCustomer(0,'subsale',false));
		else $this->setSPlan($objSend->getActionForCustomer($this->getId(),'subsale',false));
		$this->setSPlanDetails($objSend->getActionDetailsByArray($this->getSPlan()));

		if ($this->getGlobDPlan()  == 1) $this->setDPlan($objSend->getActionForCustomer(0,'subdelivery',false));
		else $this->setDPlan($objSend->getActionForCustomer($this->getId(),'subdelivery',false));
		$this->setDPlanDetails($objSend->getActionDetailsByArray($this->getDPlan()));

		if ($this->getCurrency() != 0)
		{
			$modelCurrency = new \Gsales\Model\Currency();
			$currency = $modelCurrency->getDetailsById($this->currency);
			if (false == $currency) $this->setCurrency(0);
			else $this->setCurrencyName($currency->getName());
		}

	}


	public function factorADefaultCustomer($refCore)
	{
		$this->setIPreTxt($refCore->cfg->v('invoice_pre_txt'));
		$this->setIPostTxt($refCore->cfg->v('invoice_post_txt'));
		$this->setIPayable($refCore->cfg->v('invoice_paypable'));
		$this->setITemplate($refCore->cfg->v('invoice_template'));
		$this->setIZugferd($refCore->cfg->v('pdf_invoice_zugferd_schema'));
		$this->setOPreTxt($refCore->cfg->v('offer_pre_txt'));
		$this->setOPostTxt($refCore->cfg->v('offer_post_txt'));
		$this->setOPayable($refCore->cfg->v('offer_paypable'));
		$this->setOTemplate($refCore->cfg->v('offer_template'));
		$this->setRPreTxt($refCore->cfg->v('refund_pre_txt'));
		$this->setRPostTxt($refCore->cfg->v('refund_post_txt'));
		$this->setRPayable($refCore->cfg->v('refund_paypable'));
		$this->setRTemplate($refCore->cfg->v('refund_template'));
		$this->setSPreTxt($refCore->cfg->v('sale_pre_txt'));
		$this->setSPostTxt($refCore->cfg->v('sale_post_txt'));
		$this->setSTemplate($refCore->cfg->v('sale_template'));
		$this->setDPreTxt($refCore->cfg->v('delivery_pre_txt'));
		$this->setDPostTxt($refCore->cfg->v('delivery_post_txt'));
		$this->setDTemplate($refCore->cfg->v('delivery_template'));
		$this->setDiscount($refCore->cfg->v('discount'));

		$objSend = new gs_sendplan($refCore);
		$this->setOPlan($objSend->getActionForCustomer(0,'suboffer',false));
		$this->setIPlan($objSend->getActionForCustomer(0,'subinvoice',false));
		$this->setMPlan($objSend->getActionForCustomer(0,'dunning',false));
		$this->setRPlan($objSend->getActionForCustomer(0,'subrefund',false));
		$this->setLPlan($objSend->getActionForCustomer(0,'subletter',false));
		$this->setSPlan($objSend->getActionForCustomer(0,'subsale',false));
		$this->setDPlan($objSend->getActionForCustomer(0,'subdelivery',false));

		$this->setDunningTermInfo($refCore->cfg->v('dunning_term_info'));
		$this->setDunningTerm1($refCore->cfg->v('dunning_term_1'));
		$this->setDunningTerm2($refCore->cfg->v('dunning_term_2'));
	}

	public function setDefaults($refCore)
	{

		if ($this->getGlobIPreTxt() != 1 && null == $this->getIPreTxt()) $this->setIPreTxt($refCore->cfg->v('invoice_pre_txt'));
		if ($this->getGlobIPostTxt() != 1 && null == $this->getIPostTxt()) $this->setIPostTxt($refCore->cfg->v('invoice_post_txt'));
		if ($this->getGlobIPayable() != 1 && null == $this->getIPayable()) $this->setIPayable($refCore->cfg->v('invoice_paypable'));
		if ($this->getGlobITemplate() != 1 && null == $this->getITemplate()) $this->setITemplate($refCore->cfg->v('invoice_template'));
		if ($this->getGlobIZugferd() != 1 && null == $this->getIZugferd()) $this->setIZugferd($refCore->cfg->v('pdf_invoice_zugferd_schema'));
		if ($this->getGlobOPreTxt() != 1 && null == $this->getOPreTxt()) $this->setOPreTxt($refCore->cfg->v('offer_pre_txt'));
		if ($this->getGlobOPostTxt() != 1 && null == $this->getOPostTxt()) $this->setOPostTxt($refCore->cfg->v('offer_post_txt'));
		if ($this->getGlobOPayable() != 1 && null == $this->getOPayable()) $this->setOPayable($refCore->cfg->v('offer_paypable'));
		if ($this->getGlobOTemplate() != 1 && null == $this->getOTemplate()) $this->setOTemplate($refCore->cfg->v('offer_template'));
		if ($this->getGlobRPreTxt() != 1 && null == $this->getRPreTxt()) $this->setRPreTxt($refCore->cfg->v('refund_pre_txt'));
		if ($this->getGlobRPostTxt() != 1 && null == $this->getRPostTxt()) $this->setRPostTxt($refCore->cfg->v('refund_post_txt'));
		if ($this->getGlobRPayable() != 1 && null == $this->getRPayable()) $this->setRPayable($refCore->cfg->v('refund_paypable'));
		if ($this->getGlobRTemplate() != 1 && null == $this->getRTemplate()) $this->setRTemplate($refCore->cfg->v('refund_template'));
		if ($this->getGlobSPreTxt() != 1 && null == $this->getSPreTxt()) $this->setSPreTxt($refCore->cfg->v('sale_pre_txt'));
		if ($this->getGlobSPostTxt() != 1 && null == $this->getSPostTxt()) $this->setSPostTxt($refCore->cfg->v('sale_post_txt'));
		if ($this->getGlobSTemplate() != 1 && null == $this->getSTemplate()) $this->setSTemplate($refCore->cfg->v('sale_template'));
		if ($this->getGlobDPreTxt() != 1 && null == $this->getDPreTxt()) $this->setDPreTxt($refCore->cfg->v('delivery_pre_txt'));
		if ($this->getGlobDPostTxt() != 1 && null == $this->getDPostTxt()) $this->setDPostTxt($refCore->cfg->v('delivery_post_txt'));
		if ($this->getGlobDTemplate() != 1 && null == $this->getDTemplate()) $this->setDTemplate($refCore->cfg->v('delivery_template'));
		if ($this->getGlobDiscount() != 1 && null == $this->getDiscount()) $this->setDiscount($refCore->cfg->v('discount'));

		$objSend = new gs_sendplan($refCore);
		if (null == $this->getOPlan()) $this->setOPlan($objSend->getActionForCustomer(0,'suboffer',false));
		if (null == $this->getIPlan()) $this->setIPlan($objSend->getActionForCustomer(0,'subinvoice',false));
		if (null == $this->getMPlan()) $this->setMPlan($objSend->getActionForCustomer(0,'dunning',false));
		if (null == $this->getRPlan()) $this->setRPlan($objSend->getActionForCustomer(0,'subrefund',false));
		if (null == $this->getLPlan()) $this->setLPlan($objSend->getActionForCustomer(0,'subletter',false));
		if (null == $this->getSPlan()) $this->setSPlan($objSend->getActionForCustomer(0,'subsale',false));
		if (null == $this->getDPlan()) $this->setDPlan($objSend->getActionForCustomer(0,'subdelivery',false));

		if (null == $this->getDunningTermInfo()) $this->setDunningTermInfo($refCore->cfg->v('dunning_term_info'));
		if (null == $this->getDunningTerm1()) $this->setDunningTerm1($refCore->cfg->v('dunning_term_1'));
		if (null == $this->getDunningTerm2()) $this->setDunningTerm2($refCore->cfg->v('dunning_term_2'));
	}

	public function setCheckBoxDefaults($d){

		// set and get defaults [glob_x] == on -> [x] = value
		/*
		// MACHT DAS HIER IN VIEL:
		if ($d[glob_i_pre_txt] == 'on' || $d[glob_i_pre_txt] == 1){
			$d[glob_i_pre_txt] = 1;
			$d[i_pre_txt] = '';
		} else {
			$d[glob_i_pre_txt] = 0;
		}
		*/

		$defaults = array(
			'i_pre_txt','i_post_txt','i_payable','i_template','i_zugferd',
			'o_pre_txt','o_post_txt','o_payable','o_template',
			'r_pre_txt','r_post_txt','r_payable','r_template',
			's_pre_txt','s_post_txt','s_template',
			'd_pre_txt','d_post_txt','d_template',
			'dunning_term_info','dunning_term_1','dunning_term_2',
			'o_plan','i_plan','r_plan', 'm_plan', 'l_plan', 's_plan', 'd_plan',
			'discount','interval'
		);

		foreach ($defaults as $key => $value){
			$checkbox = 'glob_'.$value;
			//$field = $value;
			if (isset($d[$checkbox]) && ($d[$checkbox] === 'on' || $d[$checkbox] == 1)){
				$this->{'set'.CamelCaps::camelCaps('glob_'.$value)}(1);
				if (method_exists($this,'set'.CamelCaps::camelCaps($value))){
					if ($value == 'dunning_term_info' || $value == 'dunning_term_1' || $value == 'dunning_term_2' || $value == 'discount')  $this->{'set'.CamelCaps::camelCaps($value)}(0); // felder vom typ integer
					else $this->{'set'.CamelCaps::camelCaps($value)}(''); // felder vom typ string
				}
				#$d[$checkbox] = 1;
				#$d[$field] = '';
			} else {
				$this->{'set'.CamelCaps::camelCaps('glob_'.$value)}(0);
				//$d[$checkbox] = 0;
			}
			//unset($checkbox,$field);
		}
		//return $d;
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
	public function getTyp()
	{
		return $this->typ;
	}

	/**
	 * @param mixed $typ
	 */
	public function setTyp($typ): void
	{
		$this->typ = $typ;
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
	public function getCompany()
	{
		return $this->company;
	}

	/**
	 * @param mixed $company
	 */
	public function setCompany($company): void
	{
		$this->company = $company;
	}

	public function getCompanylabel()
	{
		$strReturn = '';
		if ($this->getCompany() != '') $strReturn .= $this->getCompany().' - ';
		if ($this->getFirstname() != '' || $this->getLastname() != '') $strReturn .= trim($this->getFirstname().' '.$this->getLastname());
		if ($strReturn == '') $strReturn .= 'keine Firma/Name für Kundennummer hinterlegt';
		$strReturn .= '('.$this->getCustomerno().')';
		return $strReturn;
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
	public function getFirstname()
	{
		return $this->firstname;
	}

	/**
	 * @param mixed $firstname
	 */
	public function setFirstname($firstname): void
	{
		$this->firstname = $firstname;
	}

	/**
	 * @return mixed
	 */
	public function getLastname()
	{
		return $this->lastname;
	}

	/**
	 * @param mixed $lastname
	 */
	public function setLastname($lastname): void
	{
		$this->lastname = $lastname;
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
		if ($print_contactperson == 'on' ||$print_contactperson == 1) $this->print_contactperson = 1;
	}

	/**
	 * @return mixed
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * @param mixed $address
	 */
	public function setAddress($address): void
	{
		$this->address = $address;
	}

	/**
	 * @return mixed
	 */
	public function getZip()
	{
		return $this->zip;
	}

	/**
	 * @param mixed $zip
	 */
	public function setZip($zip): void
	{
		$this->zip = $zip;
	}

	/**
	 * @return mixed
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * @param mixed $city
	 */
	public function setCity($city): void
	{
		$this->city = $city;
	}

	/**
	 * @return mixed
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * @param mixed $country
	 */
	public function setCountry($country): void
	{
		$this->country = $country;
	}

	/**
	 * @return mixed
	 */
	public function getTaxnumber()
	{
		return $this->taxnumber;
	}

	/**
	 * @param mixed $taxnumber
	 */
	public function setTaxnumber($taxnumber): void
	{
		$this->taxnumber = $taxnumber;
	}

	/**
	 * @return mixed
	 */
	public function getSalestaxfree()
	{
		return $this->salestaxfree;
	}

	/**
	 * @param mixed $salestaxfree
	 */
	public function setSalestaxfree($salestaxfree): void
	{
		$this->salestaxfree = $salestaxfree;
	}

	/**
	 * @return mixed
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param mixed $phone
	 */
	public function setPhone($phone): void
	{
		$this->phone = $phone;
	}

	/**
	 * @return mixed
	 */
	public function getCellular()
	{
		return $this->cellular;
	}

	/**
	 * @param mixed $cellular
	 */
	public function setCellular($cellular): void
	{
		$this->cellular = $cellular;
	}

	/**
	 * @return mixed
	 */
	public function getFax()
	{
		return $this->fax;
	}

	/**
	 * @param mixed $fax
	 */
	public function setFax($fax): void
	{
		$this->fax = $fax;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email): void
	{
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getHomepage()
	{
		return $this->homepage;
	}

	/**
	 * @param mixed $homepage
	 */
	public function setHomepage($homepage): void
	{
		$this->homepage = $homepage;
	}

	/**
	 * @return mixed
	 */
	public function getBirthdate()
	{
		return $this->birthdate;
	}

	/**
	 * @param mixed $birthdate
	 */
	public function setBirthdate($birthdate): void
	{
		$this->birthdate = $birthdate;
	}

	/**
	 * @return mixed
	 */
	public function getBankAccountNo()
	{
		return $this->bank_account_no;
	}

	/**
	 * @param mixed $bank_account_no
	 */
	public function setBankAccountNo($bank_account_no): void
	{
		$this->bank_account_no = RemoveSpaces::removeSpaces($bank_account_no);
	}

	/**
	 * @return mixed
	 */
	public function getBankCode()
	{
		return $this->bank_code;
	}

	/**
	 * @param mixed $bank_code
	 */
	public function setBankCode($bank_code): void
	{
		$this->bank_code = RemoveSpaces::removeSpaces($bank_code);
	}

	/**
	 * @return mixed
	 */
	public function getBankName()
	{
		return $this->bank_name;
	}

	/**
	 * @param mixed $bank_name
	 */
	public function setBankName($bank_name): void
	{
		$this->bank_name = UppercaseAndRemoveUmlaut::uppercaseAndRemoveUmlaut($bank_name);
	}

	/**
	 * @return mixed
	 */
	public function getBankAccountOwner()
	{
		return $this->bank_account_owner;
	}

	/**
	 * @param mixed $bank_account_owner
	 */
	public function setBankAccountOwner($bank_account_owner): void
	{
		$this->bank_account_owner = UppercaseAndRemoveUmlaut::uppercaseAndRemoveUmlaut($bank_account_owner);
	}

	/**
	 * @return mixed
	 */
	public function getBankIban()
	{
		return $this->bank_iban;
	}

	/**
	 * @param mixed $bank_iban
	 */
	public function setBankIban($bank_iban): void
	{
		$this->bank_iban = RemoveSpaces::removeSpaces($bank_iban);
	}

	/**
	 * @return mixed
	 */
	public function getBankBic()
	{
		return $this->bank_bic;
	}

	/**
	 * @param mixed $bank_bic
	 */
	public function setBankBic($bank_bic): void
	{
		$this->bank_bic = RemoveSpaces::removeSpaces($bank_bic);
	}

	/**
	 * @return mixed
	 */
	public function getSepaDebSigDate()
	{
		return $this->sepa_deb_sig_date;
	}

	/**
	 * @param mixed $sepa_deb_sig_date
	 */
	public function setSepaDebSigDate($sepa_deb_sig_date): void
	{
		$this->sepa_deb_sig_date = DateDe2EnWithoutDateCheck::dateDe2EnWithoutDateCheck($sepa_deb_sig_date);
	}

	/**
	 * @return mixed
	 */
	public function getSepaRef()
	{
		return $this->sepa_ref;
	}

	/**
	 * @param mixed $sepa_ref
	 */
	public function setSepaRef($sepa_ref): void
	{
		$this->sepa_ref = $sepa_ref;
	}

	/**
	 * @return mixed
	 */
	public function getMailInvoices()
	{
		return $this->mail_invoices;
	}

	/**
	 * @param mixed $mail_invoices
	 */
	public function setMailInvoices($mail_invoices): void
	{
		$this->mail_invoices = 0;
		if ($mail_invoices == 'on' || $mail_invoices == 1) $this->mail_invoices = 1;
	}

	/**
	 * @return mixed
	 */
	public function getMailPaymreminders()
	{
		return $this->mail_paymreminders;
	}

	/**
	 * @param mixed $mail_paymreminders
	 */
	public function setMailPaymreminders($mail_paymreminders): void
	{
		$this->mail_paymreminders = 0;
		if ($mail_paymreminders == 'on' || $mail_paymreminders == 1) $this->mail_paymreminders = 1;
	}

	/**
	 * @return mixed
	 */
	public function getGlobDiscount()
	{
		return $this->glob_discount;
	}

	/**
	 * @param mixed $glob_discount
	 */
	public function setGlobDiscount($glob_discount): void
	{
		$this->glob_discount = $glob_discount;
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
		$this->discount = NumberDe2En::numberDe2En($discount);
	}

	/**
	 * @return mixed
	 */
	public function getGlobOPreTxt()
	{
		return $this->glob_o_pre_txt;
	}

	/**
	 * @param mixed $glob_o_pre_txt
	 */
	public function setGlobOPreTxt($glob_o_pre_txt): void
	{
		$this->glob_o_pre_txt = $glob_o_pre_txt;
	}

	/**
	 * @return mixed
	 */
	public function getOPreTxt()
	{
		return $this->o_pre_txt;
	}

	/**
	 * @param mixed $o_pre_txt
	 */
	public function setOPreTxt($o_pre_txt): void
	{
		$this->o_pre_txt = $o_pre_txt;
	}

	/**
	 * @return mixed
	 */
	public function getGlobOPostTxt()
	{
		return $this->glob_o_post_txt;
	}

	/**
	 * @param mixed $glob_o_post_txt
	 */
	public function setGlobOPostTxt($glob_o_post_txt): void
	{
		$this->glob_o_post_txt = $glob_o_post_txt;
	}

	/**
	 * @return mixed
	 */
	public function getOPostTxt()
	{
		return $this->o_post_txt;
	}

	/**
	 * @param mixed $o_post_txt
	 */
	public function setOPostTxt($o_post_txt): void
	{
		$this->o_post_txt = $o_post_txt;
	}

	/**
	 * @return mixed
	 */
	public function getGlobOPayable()
	{
		return $this->glob_o_payable;
	}

	/**
	 * @param mixed $glob_o_payable
	 */
	public function setGlobOPayable($glob_o_payable): void
	{
		$this->glob_o_payable = $glob_o_payable;
	}

	/**
	 * @return mixed
	 */
	public function getOPayable()
	{
		return $this->o_payable;
	}

	/**
	 * @param mixed $o_payable
	 */
	public function setOPayable($o_payable): void
	{
		$this->o_payable = intval($o_payable);
	}

	/**
	 * @return mixed
	 */
	public function getGlobOTemplate()
	{
		return $this->glob_o_template;
	}

	/**
	 * @param mixed $glob_o_template
	 */
	public function setGlobOTemplate($glob_o_template): void
	{
		$this->glob_o_template = $glob_o_template;
	}

	/**
	 * @return mixed
	 */
	public function getOTemplate()
	{
		return $this->o_template;
	}

	/**
	 * @param mixed $o_template
	 */
	public function setOTemplate($o_template): void
	{
		$this->o_template = $o_template;
	}

	/**
	 * @return mixed
	 */
	public function getGlobIPreTxt()
	{
		return $this->glob_i_pre_txt;
	}

	/**
	 * @param mixed $glob_i_pre_txt
	 */
	public function setGlobIPreTxt($glob_i_pre_txt): void
	{
		$this->glob_i_pre_txt = $glob_i_pre_txt;
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
	public function getGlobIPostTxt()
	{
		return $this->glob_i_post_txt;
	}

	/**
	 * @param mixed $glob_i_post_txt
	 */
	public function setGlobIPostTxt($glob_i_post_txt): void
	{
		$this->glob_i_post_txt = $glob_i_post_txt;
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
	public function getGlobIPayable()
	{
		return $this->glob_i_payable;
	}

	/**
	 * @param mixed $glob_i_payable
	 */
	public function setGlobIPayable($glob_i_payable): void
	{
		$this->glob_i_payable = $glob_i_payable;
	}

	/**
	 * @return mixed
	 */
	public function getIPayable()
	{
		return $this->i_payable;
	}

	/**
	 * @param mixed $i_payable
	 */
	public function setIPayable($i_payable): void
	{
		$this->i_payable = intval($i_payable);
	}

	/**
	 * @return mixed
	 */
	public function getGlobITemplate()
	{
		return $this->glob_i_template;
	}

	/**
	 * @param mixed $glob_i_template
	 */
	public function setGlobITemplate($glob_i_template): void
	{
		$this->glob_i_template = $glob_i_template;
	}

	/**
	 * @return mixed
	 */
	public function getITemplate()
	{
		return $this->i_template;
	}

	/**
	 * @param mixed $i_template
	 */
	public function setITemplate($i_template): void
	{
		$this->i_template = $i_template;
	}

	/**
	 * @return mixed
	 */
	public function getGlobRPreTxt()
	{
		return $this->glob_r_pre_txt;
	}

	/**
	 * @param mixed $glob_r_pre_txt
	 */
	public function setGlobRPreTxt($glob_r_pre_txt): void
	{
		$this->glob_r_pre_txt = $glob_r_pre_txt;
	}

	/**
	 * @return mixed
	 */
	public function getRPreTxt()
	{
		return $this->r_pre_txt;
	}

	/**
	 * @param mixed $r_pre_txt
	 */
	public function setRPreTxt($r_pre_txt): void
	{
		$this->r_pre_txt = $r_pre_txt;
	}

	/**
	 * @return mixed
	 */
	public function getGlobRPostTxt()
	{
		return $this->glob_r_post_txt;
	}

	/**
	 * @param mixed $glob_r_post_txt
	 */
	public function setGlobRPostTxt($glob_r_post_txt): void
	{
		$this->glob_r_post_txt = $glob_r_post_txt;
	}

	/**
	 * @return mixed
	 */
	public function getRPostTxt()
	{
		return $this->r_post_txt;
	}

	/**
	 * @param mixed $r_post_txt
	 */
	public function setRPostTxt($r_post_txt): void
	{
		$this->r_post_txt = $r_post_txt;
	}

	/**
	 * @return mixed
	 */
	public function getGlobRPayable()
	{
		return $this->glob_r_payable;
	}

	/**
	 * @param mixed $glob_r_payable
	 */
	public function setGlobRPayable($glob_r_payable): void
	{
		$this->glob_r_payable = $glob_r_payable;
	}

	/**
	 * @return mixed
	 */
	public function getRPayable()
	{
		return $this->r_payable;
	}

	/**
	 * @param mixed $r_payable
	 */
	public function setRPayable($r_payable): void
	{
		$this->r_payable = intval($r_payable);
	}

	/**
	 * @return mixed
	 */
	public function getGlobRTemplate()
	{
		return $this->glob_r_template;
	}

	/**
	 * @param mixed $glob_r_template
	 */
	public function setGlobRTemplate($glob_r_template): void
	{
		$this->glob_r_template = $glob_r_template;
	}

	/**
	 * @return mixed
	 */
	public function getRTemplate()
	{
		return $this->r_template;
	}

	/**
	 * @param mixed $r_template
	 */
	public function setRTemplate($r_template): void
	{
		$this->r_template = $r_template;
	}

	/**
	 * @return mixed
	 */
	public function getGlobSPreTxt()
	{
		return $this->glob_s_pre_txt;
	}

	/**
	 * @param mixed $glob_s_pre_txt
	 */
	public function setGlobSPreTxt($glob_s_pre_txt): void
	{
		$this->glob_s_pre_txt = $glob_s_pre_txt;
	}

	/**
	 * @return mixed
	 */
	public function getSPreTxt()
	{
		return $this->s_pre_txt;
	}

	/**
	 * @param mixed $s_pre_txt
	 */
	public function setSPreTxt($s_pre_txt): void
	{
		$this->s_pre_txt = $s_pre_txt;
	}

	/**
	 * @return mixed
	 */
	public function getGlobSPostTxt()
	{
		return $this->glob_s_post_txt;
	}

	/**
	 * @param mixed $glob_s_post_txt
	 */
	public function setGlobSPostTxt($glob_s_post_txt): void
	{
		$this->glob_s_post_txt = $glob_s_post_txt;
	}

	/**
	 * @return mixed
	 */
	public function getSPostTxt()
	{
		return $this->s_post_txt;
	}

	/**
	 * @param mixed $s_post_txt
	 */
	public function setSPostTxt($s_post_txt): void
	{
		$this->s_post_txt = $s_post_txt;
	}

	/**
	 * @return mixed
	 */
	public function getGlobSTemplate()
	{
		return $this->glob_s_template;
	}

	/**
	 * @param mixed $glob_s_template
	 */
	public function setGlobSTemplate($glob_s_template): void
	{
		$this->glob_s_template = $glob_s_template;
	}

	/**
	 * @return mixed
	 */
	public function getSTemplate()
	{
		return $this->s_template;
	}

	/**
	 * @param mixed $s_template
	 */
	public function setSTemplate($s_template): void
	{
		$this->s_template = $s_template;
	}

	/**
	 * @return mixed
	 */
	public function getGlobDPreTxt()
	{
		return $this->glob_d_pre_txt;
	}

	/**
	 * @param mixed $glob_d_pre_txt
	 */
	public function setGlobDPreTxt($glob_d_pre_txt): void
	{
		$this->glob_d_pre_txt = $glob_d_pre_txt;
	}

	/**
	 * @return mixed
	 */
	public function getDPreTxt()
	{
		return $this->d_pre_txt;
	}

	/**
	 * @param mixed $d_pre_txt
	 */
	public function setDPreTxt($d_pre_txt): void
	{
		$this->d_pre_txt = $d_pre_txt;
	}

	/**
	 * @return mixed
	 */
	public function getGlobDPostTxt()
	{
		return $this->glob_d_post_txt;
	}

	/**
	 * @param mixed $glob_d_post_txt
	 */
	public function setGlobDPostTxt($glob_d_post_txt): void
	{
		$this->glob_d_post_txt = $glob_d_post_txt;
	}

	/**
	 * @return mixed
	 */
	public function getDPostTxt()
	{
		return $this->d_post_txt;
	}

	/**
	 * @param mixed $d_post_txt
	 */
	public function setDPostTxt($d_post_txt): void
	{
		$this->d_post_txt = $d_post_txt;
	}

	/**
	 * @return mixed
	 */
	public function getGlobDTemplate()
	{
		return $this->glob_d_template;
	}

	/**
	 * @param mixed $glob_d_template
	 */
	public function setGlobDTemplate($glob_d_template): void
	{
		$this->glob_d_template = $glob_d_template;
	}

	/**
	 * @return mixed
	 */
	public function getDTemplate()
	{
		return $this->d_template;
	}

	/**
	 * @param mixed $d_template
	 */
	public function setDTemplate($d_template): void
	{
		$this->d_template = $d_template;
	}

	/**
	 * @return mixed
	 */
	public function getGlobIZugferd()
	{
		return $this->glob_i_zugferd;
	}

	/**
	 * @param mixed $glob_i_zugferd
	 */
	public function setGlobIZugferd($glob_i_zugferd): void
	{
		$this->glob_i_zugferd = $glob_i_zugferd;
	}

	/**
	 * @return mixed
	 */
	public function getIZugferd()
	{
		return $this->i_zugferd;
	}

	/**
	 * @param mixed $i_zugferd
	 */
	public function setIZugferd($i_zugferd): void
	{
		$this->i_zugferd = $i_zugferd;
	}

	/**
	 * @return mixed
	 */
	public function getIZugferdLeitwegid()
	{
		return $this->i_zugferd_leitwegid;
	}

	/**
	 * @param mixed $i_zugferd_leitwegid
	 */
	public function setIZugferdLeitwegid($i_zugferd_leitwegid): void
	{
		$this->i_zugferd_leitwegid = $i_zugferd_leitwegid;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerText()
	{
		return $this->customer_text;
	}

	/**
	 * @param mixed $customer_text
	 */
	public function setCustomerText($customer_text): void
	{
		$this->customer_text = $customer_text;
	}

	/**
	 * @return mixed
	 */
	public function getGlobInterval()
	{
		return $this->glob_interval;
	}

	/**
	 * @param mixed $glob_interval
	 */
	public function setGlobInterval($glob_interval): void
	{
		if ($glob_interval == 1){
			if (null == $this->getStart()) $this->setStart(date("Y-m-d"));
			else $this->setStart(gsDateDe2EnWithoutDateCheck($this->getStart()));
			if ($this->getMinterval() < 1) $this->setMinterval(1);
			$this->setNextaction($this->getStart());
		} else {
			$this->setStart(null);
			$this->setNextaction(null);
			$this->setMinterval(1);
		}

		$this->glob_interval = $glob_interval;
	}

	/**
	 * @return mixed
	 */
	public function getMinterval()
	{
		return $this->minterval;
	}

	/**
	 * @param mixed $minterval
	 */
	public function setMinterval($minterval): void
	{
		$this->minterval = intval($minterval);
	}

	/**
	 * @return mixed
	 */
	public function getStart()
	{
		return $this->start;
	}

	/**
	 * @param mixed $start
	 */
	public function setStart($start): void
	{
		$this->start = $start;
	}

	/**
	 * @return mixed
	 */
	public function getNextaction()
	{
		return $this->nextaction;
	}

	/**
	 * @param mixed $nextaction
	 */
	public function setNextaction($nextaction): void
	{
		$this->nextaction = $nextaction;
	}

	/**
	 * @return mixed
	 */
	public function getDtaus()
	{
		return $this->dtaus;
	}

	/**
	 * @param mixed $dtaus
	 */
	public function setDtaus($dtaus): void
	{
		$this->dtaus = $dtaus;
		if ($dtaus == 'on' || $dtaus == 1) $this->dtaus = 1;
	}

	/**
	 * @return mixed
	 */
	public function getNodunning()
	{
		return $this->nodunning;
	}

	/**
	 * @param mixed $nodunning
	 */
	public function setNodunning($nodunning): void
	{
		$this->nodunning = $nodunning;
		if ($nodunning == 'on' || $nodunning == 1) $this->nodunning = 1;
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
	 * @return mixed
	 */
	public function getGlobDunningTermInfo()
	{
		return $this->glob_dunning_term_info;
	}

	/**
	 * @param mixed $glob_dunning_term_info
	 */
	public function setGlobDunningTermInfo($glob_dunning_term_info): void
	{
		$this->glob_dunning_term_info = $glob_dunning_term_info;
	}

	/**
	 * @return mixed
	 */
	public function getDunningTermInfo()
	{
		return $this->dunning_term_info;
	}

	/**
	 * @param mixed $dunning_term_info
	 */
	public function setDunningTermInfo($dunning_term_info): void
	{
		$this->dunning_term_info = intval($dunning_term_info);
	}

	/**
	 * @return mixed
	 */
	public function getGlobDunningTerm1()
	{
		return $this->glob_dunning_term_1;
	}

	/**
	 * @param mixed $glob_dunning_term_1
	 */
	public function setGlobDunningTerm1($glob_dunning_term_1): void
	{
		$this->glob_dunning_term_1 = $glob_dunning_term_1;
	}

	/**
	 * @return mixed
	 */
	public function getDunningTerm1()
	{
		return $this->dunning_term_1;
	}

	/**
	 * @param mixed $dunning_term_1
	 */
	public function setDunningTerm1($dunning_term_1): void
	{
		$this->dunning_term_1 = intval($dunning_term_1);
	}

	/**
	 * @return mixed
	 */
	public function getGlobDunningTerm2()
	{
		return $this->glob_dunning_term_2;
	}

	/**
	 * @param mixed $glob_dunning_term_2
	 */
	public function setGlobDunningTerm2($glob_dunning_term_2): void
	{
		$this->glob_dunning_term_2 = intval($glob_dunning_term_2);
	}

	/**
	 * @return mixed
	 */
	public function getDunningTerm2()
	{
		return $this->dunning_term_2;
	}

	/**
	 * @param mixed $dunning_term_2
	 */
	public function setDunningTerm2($dunning_term_2): void
	{
		$this->dunning_term_2 = $dunning_term_2;
	}

	/**
	 * @return mixed
	 */
	public function getGlobOPlan()
	{
		return $this->glob_o_plan;
	}

	/**
	 * @param mixed $glob_o_plan
	 */
	public function setGlobOPlan($glob_o_plan): void
	{
		$this->glob_o_plan = $glob_o_plan;
	}

	/**
	 * @return mixed
	 */
	public function getGlobIPlan()
	{
		return $this->glob_i_plan;
	}

	/**
	 * @param mixed $glob_i_plan
	 */
	public function setGlobIPlan($glob_i_plan): void
	{
		$this->glob_i_plan = $glob_i_plan;
	}

	/**
	 * @return mixed
	 */
	public function getGlobMPlan()
	{
		return $this->glob_m_plan;
	}

	/**
	 * @param mixed $glob_m_plan
	 */
	public function setGlobMPlan($glob_m_plan): void
	{
		$this->glob_m_plan = $glob_m_plan;
	}

	/**
	 * @return mixed
	 */
	public function getGlobRPlan()
	{
		return $this->glob_r_plan;
	}

	/**
	 * @param mixed $glob_r_plan
	 */
	public function setGlobRPlan($glob_r_plan): void
	{
		$this->glob_r_plan = $glob_r_plan;
	}

	/**
	 * @return mixed
	 */
	public function getGlobLPlan()
	{
		return $this->glob_l_plan;
	}

	/**
	 * @param mixed $glob_l_plan
	 */
	public function setGlobLPlan($glob_l_plan): void
	{
		$this->glob_l_plan = $glob_l_plan;
	}

	/**
	 * @return mixed
	 */
	public function getGlobSPlan()
	{
		return $this->glob_s_plan;
	}

	/**
	 * @param mixed $glob_s_plan
	 */
	public function setGlobSPlan($glob_s_plan): void
	{
		$this->glob_s_plan = $glob_s_plan;
	}

	/**
	 * @return mixed
	 */
	public function getGlobDPlan()
	{
		return $this->glob_d_plan;
	}

	/**
	 * @param mixed $glob_d_plan
	 */
	public function setGlobDPlan($glob_d_plan): void
	{
		$this->glob_d_plan = $glob_d_plan;
	}

	/**
	 * @return mixed
	 */
	public function getMailformat()
	{
		return $this->mailformat;
	}

	/**
	 * @param mixed $mailformat
	 */
	public function setMailformat($mailformat): void
	{
		$this->mailformat = $mailformat;
	}

	/**
	 * @return mixed
	 */
	public function getFrontendActive()
	{
		return $this->frontend_active;
	}

	/**
	 * @param mixed $frontend_active
	 */
	public function setFrontendActive($frontend_active): void
	{
		$this->frontend_active = 0;
		if ($frontend_active == 'on' || $frontend_active == 1) $this->frontend_active = 1;
	}

	/**
	 * @return mixed
	 */
	public function getFrontendPassword()
	{
		return $this->frontend_password;
	}

	/**
	 * @param mixed $frontend_password
	 */
	public function setFrontendPassword($frontend_password): void
	{
		if ($frontend_password != '') $this->frontend_password = md5($frontend_password);
	}

	/**
	 * @return mixed
	 */
	public function getFrontendPasswordlost()
	{
		return $this->frontend_passwordlost;
	}

	/**
	 * @param mixed $frontend_passwordlost
	 */
	public function setFrontendPasswordlost($frontend_passwordlost): void
	{
		$this->frontend_passwordlost = $frontend_passwordlost;
	}

	/**
	 * @return mixed
	 */
	public function getProposedChanges()
	{
		return $this->proposed_changes;
	}

	/**
	 * @param mixed $proposed_changes
	 */
	public function setProposedChanges($proposed_changes): void
	{
		$this->proposed_changes = $proposed_changes;
	}

	/**
	 * @return mixed
	 */
	public function getCurrency()
	{
		return $this->currency;
	}

	/**
	 * @param mixed $currency
	 */
	public function setCurrency($currency): void
	{
		$this->currency = $currency;
	}

	/**
	 * @return mixed
	 */
	public function getOPlan()
	{
		return $this->o_plan;
	}

	/**
	 * @param mixed $o_plan
	 */
	public function setOPlan($o_plan): void
	{
		$this->o_plan = $o_plan;
	}

	/**
	 * @return mixed
	 */
	public function getIPlan()
	{
		return $this->i_plan;
	}

	/**
	 * @param mixed $i_plan
	 */
	public function setIPlan($i_plan): void
	{
		$this->i_plan = $i_plan;
	}

	/**
	 * @return mixed
	 */
	public function getMPlan()
	{
		return $this->m_plan;
	}

	/**
	 * @param mixed $m_plan
	 */
	public function setMPlan($m_plan): void
	{
		$this->m_plan = $m_plan;
	}

	/**
	 * @return mixed
	 */
	public function getRPlan()
	{
		return $this->r_plan;
	}

	/**
	 * @param mixed $r_plan
	 */
	public function setRPlan($r_plan): void
	{
		$this->r_plan = $r_plan;
	}

	/**
	 * @return mixed
	 */
	public function getLPlan()
	{
		return $this->l_plan;
	}

	/**
	 * @param mixed $l_plan
	 */
	public function setLPlan($l_plan): void
	{
		$this->l_plan = $l_plan;
	}

	/**
	 * @return mixed
	 */
	public function getSPlan()
	{
		return $this->s_plan;
	}

	/**
	 * @param mixed $s_plan
	 */
	public function setSPlan($s_plan): void
	{
		$this->s_plan = $s_plan;
	}

	/**
	 * @return mixed
	 */
	public function getDPlan()
	{
		return $this->d_plan;
	}

	/**
	 * @param mixed $d_plan
	 */
	public function setDPlan($d_plan): void
	{
		$this->d_plan = $d_plan;
	}

	/**
	 * @return mixed
	 */
	public function getOPlanDetails()
	{
		return $this->o_plan_details;
	}

	/**
	 * @param mixed $o_plan_details
	 */
	public function setOPlanDetails($o_plan_details): void
	{
		$this->o_plan_details = $o_plan_details;
	}

	/**
	 * @return mixed
	 */
	public function getIPlanDetails()
	{
		return $this->i_plan_details;
	}

	/**
	 * @param mixed $i_plan_details
	 */
	public function setIPlanDetails($i_plan_details): void
	{
		$this->i_plan_details = $i_plan_details;
	}

	/**
	 * @return mixed
	 */
	public function getMPlanDetails()
	{
		return $this->m_plan_details;
	}

	/**
	 * @param mixed $m_plan_details
	 */
	public function setMPlanDetails($m_plan_details): void
	{
		$this->m_plan_details = $m_plan_details;
	}

	/**
	 * @return mixed
	 */
	public function getRPlanDetails()
	{
		return $this->r_plan_details;
	}

	/**
	 * @param mixed $r_plan_details
	 */
	public function setRPlanDetails($r_plan_details): void
	{
		$this->r_plan_details = $r_plan_details;
	}

	/**
	 * @return mixed
	 */
	public function getLPlanDetails()
	{
		return $this->l_plan_details;
	}

	/**
	 * @param mixed $l_plan_details
	 */
	public function setLPlanDetails($l_plan_details): void
	{
		$this->l_plan_details = $l_plan_details;
	}

	/**
	 * @return mixed
	 */
	public function getSPlanDetails()
	{
		return $this->s_plan_details;
	}

	/**
	 * @param mixed $s_plan_details
	 */
	public function setSPlanDetails($s_plan_details): void
	{
		$this->s_plan_details = $s_plan_details;
	}

	/**
	 * @return mixed
	 */
	public function getDPlanDetails()
	{
		return $this->d_plan_details;
	}

	/**
	 * @param mixed $d_plan_details
	 */
	public function setDPlanDetails($d_plan_details): void
	{
		$this->d_plan_details = $d_plan_details;
	}

	/**
	 * @return string
	 */
	public function getCurrencyName(): string
	{
		return $this->currencyName;
	}

	/**
	 * @param string $currencyName
	 */
	public function setCurrencyName(string $currencyName): void
	{
		$this->currencyName = $currencyName;
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