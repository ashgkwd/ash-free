<?php
/*
* Author: Ashish A Gaikwad <ash.gkwd@gmail.com>
* App: Ash Free
* Copyright: 2013 All Rights Reserved
* File: /welcome.php
* Purpose: To demonstrate basic controller for Ash Free.
*/

# create class for this controller. 
# This class must be derivative of \AshFree\Base\AshController
class Welcome extends \AshFree\Base\AshController
{
	# index() is default function of any controller.
	public function index()
	{
		# lets load our view.
		$this->view->html('welcome_view');
	}
}