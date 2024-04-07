<?php

namespace Gsales\Helper;

class DateDe2EnWithoutDateCheck
{
	public static function dateDe2EnWithoutDateCheck($string)
	{
		if (null == $string) return $string;
		if (false != strstr($string,'-')) return $string;
		//12.11.2006 -> 2006-11-12
		$teile = explode('.',$string);
		return $teile[2].'-'.$teile[1].'-'.$teile[0];
	}
}