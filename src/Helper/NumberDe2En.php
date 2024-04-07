<?php

namespace Gsales\Helper;

class NumberDe2En
{
	public static function numberDe2En($string)
	{
		$string = str_replace('.','',$string);
		return str_replace(',','.',$string);
	}
}