<?php
/**
* @author: Ashish A Gaikwad <ash.gkwd@gmail.com>
* @package: Ash Free
* @version: 2.0
* @copyright: 2014 All Rights Reserved
* @since: 2.0
* base interface for Controller which can hadle application flow
*/

namespace AshFree;

interface App
{
	function get($parameters_array);
	function post($parameters_array);
	function ajax($parameters_array);
	function websocket($parameters_array);
}