<?php
/*
* Author: Ashish A Gaikwad <ash.gkwd@gmail.com>
* App: Ash Free
* File: /AshController.php
* Purpose: To handle all app requests. The landing page.
*/

namespace AshFree\Base;

abstract class AshController
{
	protected $view;
	protected $para;

	function __construct($para=[]) {
		$this->para = $para;
		
		require 'ash-free-base/AshView.php';
		$this->view = new AshView();
	}
	
	#nothing is here but still good for future :)
}