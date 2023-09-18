<?php

namespace Gsales\Entity;

use Gsales\Exception\ResponseException;

class EntityMapper {

	public function mapFromResponse($responseContent)
	{
		$arrResponse = json_decode($responseContent, true);
		if (false == isset($arrResponse['@type'])) throw new ResponseException('no @type field found');

		// multiple records
		if ($arrResponse['@type'] == 'hydra:Collection'){
			$arrResult = array();
			foreach($arrResponse['hydra:member'] as $record) $arrResult[] = $this->mapFromRecord($record);
			return $arrResult;
		}

		// single recordset
		return $this->mapFromRecord($arrResponse);
	}

	private function mapFromRecord($record)
	{
		$objectFQDN = 'Gsales\Entity\\'.$record['@type'];
		$object = new $objectFQDN;
		foreach($record as $key => $value) $this->map($object, $key, $value);
		return $object;
	}

	private function map($object, $key, $value)
	{
		if (substr($key, 0, 1) == '@') return $object; // ignore hydra fields (starting with @-identifier)
		$object->{'set'.$this->camelCaps($key)}($value); // use gsales 3 entity setters in camel caps
		return $object;
	}

	private function camelCaps($str)
	{
		$str = str_replace('_',' ', $str);
		$str = ucwords($str);
		$str = str_replace(' ','', $str);
		return $str;
	}

}