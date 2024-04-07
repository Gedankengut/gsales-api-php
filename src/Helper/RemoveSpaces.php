<?php

namespace Gsales\Helper;

class RemoveSpaces
{
	public static function removeSpaces($value)
	{
		if (null == $value) return $value;
		return str_replace(' ','',$value);
	}
}