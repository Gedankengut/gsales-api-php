<?php

namespace Gsales\Helper;

class CamelCaps
{
	public static function camelCaps($str)
	{
		$str = str_replace('_',' ', $str);
		$str = ucwords($str);
		$str = str_replace(' ','', $str);
		return $str;
	}
}