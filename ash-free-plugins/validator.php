<?php
/*
* Author: Ashish A Gaikwad <ash.gkwd@gmail.com>
* Copyright: 2013 All Rights Reserved
* App: Ash Free
* File: /validator.php
* Purpose: Form Validation Plugin. Very Useful :)
*/
namespace AshFree\Plugin;

# It is wrapper class around filter_* functions
class Validator
{
	public function required($data=[])
	{
		foreach ($data as $value) 
		{
			if (!isset($value)) return false;
			else return true;
		}
	}

	public function email($data=[])
	{
		return filter_var_array($data, FILTER_VALIDATE_EMAIL);
	}

	public function url($data=[])
	{
		return filter_var_array($data, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
	}
}