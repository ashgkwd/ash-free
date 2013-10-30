<?php
/*
* Author: Ashish A Gaikwad <ash.gkwd@gmail.com>
* App: Ash Free
* File: /index.php
* Purpose: To handle all app requests. The landing page.
*/

namespace AshFree\Base;

require_once 'ash-free-base/loader.php';

# welcome is default controller
try
{
	(new Loader('dsf'))->run();
}
catch (\Exception $e)
{
	echo $e->getMessage();
}