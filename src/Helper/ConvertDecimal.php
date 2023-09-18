<?php

namespace Gsales\Helper;

class ConvertDecimal
{
	public static function convertDecimal($value)
	{
		if (null == $value) return null;
		return floatval(str_replace(',','.',$value));
	}
}