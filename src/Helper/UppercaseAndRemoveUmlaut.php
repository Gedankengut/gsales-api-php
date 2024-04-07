<?php

namespace Gsales\Helper;

class UppercaseAndRemoveUmlaut
{
	public static function uppercaseAndRemoveUmlaut($value)
	{
		if (null == $value) return $value;
		$value = strtoupper($value);
		$value = str_replace('&AMP;', 'U', $value);
		$search = array('Ä', 'Ö', 'Ü', 'ß','ä', 'ö', 'ü', 'ß');
		$replace = array('AE', 'OE', 'UE', 'SS','AE', 'OE', 'UE', 'SS');
		return str_replace($search, $replace, $value);
	}
}