<?php

namespace Gsales\Entity;

/** Entity for GSALES contacts. */

class Contract extends Base {

	const TABLENAME = 'contracts';
	const PRIMARYKEYNAME = 'id';

	/** Start of the contract */
	public $start = '0000-00-00';

	/** End of the contract */
	public $stop = '0000-00-00';

	/** Due in advance (0) or afterwards (1) */
	public $series_art = 0;

	/** Due interval in months */
	public $interval = 1;

	/** Next duedate of the contract */
	public $duedate;

	/** Contract is billed until this date */
	public $billed_until;

	/** Contract is active and will be due when billed_until is reached */
	public $active = 1;

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
	 * @return string
	 */
	public function getStart(): string
	{
		return $this->start;
	}

	/**
	 * @param string $start
	 */
	public function setStart(string $start): void
	{
		$this->start = $start;
		// de to en
		if (null != $start && str_contains($start,'.')) {
			$teile = explode('.',$start);
			if (count($teile) > 2) $this->start = $teile[2].'-'.$teile[1].'-'.$teile[0];
		}
	}

	/**
	 * @return string
	 */
	public function getStop(): string
	{
		return $this->stop;
	}

	/**
	 * @param string $stop
	 */
	public function setStop(string $stop): void
	{
		$this->stop = $stop;
		// de to en
		if (null != $stop && str_contains($stop,'.')) {
			$teile = explode('.',$stop);
			if (count($teile) > 2) $this->stop = $teile[2].'-'.$teile[1].'-'.$teile[0];
		}
	}

	/**
	 * @return int
	 */
	public function getSeriesArt(): int
	{
		return $this->series_art;
	}

	/**
	 * @param int $series_art
	 */
	public function setSeriesArt($series_art): void
	{
		$this->series_art = 0;
		if ($series_art == 1) $this->series_art = 1;
	}

	/**
	 * @return int
	 */
	public function getInterval(): int
	{
		return $this->interval;
	}

	/**
	 * @param int $interval
	 */
	public function setInterval(int $interval): void
	{
		$this->interval = $interval;
	}

	/**
	 * @return mixed
	 */
	public function getDuedate()
	{
		return $this->duedate;
	}

	/**
	 * @param mixed $duedate
	 */
	public function setDuedate($duedate): void
	{
		$this->duedate = $duedate;
		// de to en
		if (null != $duedate && str_contains($duedate,'.')) {
			$teile = explode('.',$duedate);
			if (count($teile) > 2) $this->duedate = $teile[2].'-'.$teile[1].'-'.$teile[0];
		}
	}

	/**
	 * @return mixed
	 */
	public function getBilledUntil()
	{
		return $this->billed_until;
	}

	/**
	 * @param mixed $billed_until
	 */
	public function setBilledUntil($billed_until): void
	{
		$this->billed_until = $billed_until;
		// de to en
		if (null != $billed_until && str_contains($billed_until,'.')) {
			$teile = explode('.',$billed_until);
			if (count($teile) > 2) $this->billed_until = $teile[2].'-'.$teile[1].'-'.$teile[0];
		}
	}

	/**
	 * @return int
	 */
	public function getActive(): int
	{
		return $this->active;
	}

	/**
	 * @param int $active
	 */
	public function setActive(int $active): void
	{
		$this->active = $active;
	}

}