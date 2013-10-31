<?php
/*
* Author: Ashish A Gaikwad <ash.gkwd@gmail.com>
* App: Ash Free
* Copyright: 2013 All Rights Reserved
* File: /loader.php
* Purpose: To Load required controller and call the method
*/

namespace AshFree\Base;

class Loader
{
	private $controller_file; #this is file name of controller class
	private $method;
	private $para; # array containing all parameters 
	private $controller_class; #this will be actual class name

	function __construct($controller) {
		$request_url = explode('/', strtolower(ltrim(htmlspecialchars(str_ireplace('?'.$_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']), PHP_URL_PATH), '/')));
		$this->request = $request_url;

		if(empty($request_url) or empty($request_url[0])) 
		{
			$this->controller_file = "ash-free-controllers/{$controller}.php";
			$this->controller_class = $controller;
		}
		else
		{
			$this->controller_file = 'ash-free-controllers/'.$request_url[0].'.php';
			$this->controller_class = ucfirst($request_url[0]);
		}

		if(empty($request_url) or empty($request_url[1]))
		{
			$this->method = 'index';
			$this->para = [];
		}
		else
		{
			$this->method = $request_url[1];
			$this->para = array_map(function($s){ return htmlentities( $s , ENT_QUOTES | ENT_XML ); }, array_map('urldecode', array_slice($request_url, 2)));
		}
	}

	public function run()
	{
		if(file_exists($this->controller_file))
		{
			require 'ash-free-base/AshController.php';
			require($this->controller_file);
		}
		else
		{
			throw new \Exception("Error Processing Request : BadUrl 1", 1);
		}

		if(class_exists($this->controller_class))
		{
			# Make sure this is derivative of AshController :)
			if(in_array('AshFree\Base\AshController', class_parents($this->controller_class)))
			{
				# Make sure the requested mothod exists
				if(method_exists($this->controller_class, $this->method))
				{
					# Everything is fine :)
					return (new $this->controller_class($this->para))->{$this->method}();
				}
				else
				{
					throw new \Exception("Error Processing Request : BadUrl 2", 2);
				}
			}
			else
			{
				throw new \Exception("Error Processing Request : BadUrl 3", 3);
			}
		}
		else
		{
			throw new \Exception("Error Processing Request : BadUrl 4", 4);
		}
	}
}