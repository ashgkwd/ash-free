<?php
/*
* Author: Ashish A Gaikwad <ash.gkwd@gmail.com>
* Copyright: 2013 All Rights Reserved
* App: Ash Free
* File: /form.php
* Purpose: Form Validation Plugin. Very Usefull :)
*/
namespace AshFree\Plugin;

class Form
{
	public function required($data=[])
	{
		foreach ($data as $value) 
		{
			if (!isset($value)) return false;
			else return true;
		}
	}
}