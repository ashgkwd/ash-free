<?php
/**
* @author: Ashish A Gaikwad <ash.gkwd@gmail.com>
* @package: Ash Free
* @version: 2.0
* @copyright: 2014 All Rights Reserved
* @since: 2.0
* Loader file of app. starting point invoked by index.php
*/

namespace AshFree;

class AshLoader
{
	public function run($path=array())
	{
		$iclass = 'nama';
		$ipara = array();
		$imethod = '';

		if(!empty($path[0]))
		{
			$iclass = array_shift($path);
			if(array_key_exists(0, $path))
			{
				$ipara = $path;
			}
		}

		# now we have class name and parameters
		# lets determine method
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'PUT':
				$imethod = 'PUT';
				break;

			case 'POST':
				$imethod = 'POST';
				if(array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest' )
				{
					$imethod = 'AJAX';
				}
				break;

			case 'GET':
				$imethod = 'GET';
				break;

			case 'DELETE':
				$imethod = 'DELETE';
				break;
			
			default:
				$imethod = null;
				break;
		}

		# we know method, lets call respected function
		if(!file_exists('ash-free-app/'.$iclass.'.php')) throw new \Exception("Error Processing Request [no file]", 1);
		
		require('ash-free-app/'.$iclass.'.php');
		$iclass = ucwords($iclass);

		if(!class_exists($iclass)) throw new \Exception("Error Processing Request [no class]", 2);
		
		$object = new $iclass;

		if(!method_exists($iclass, $imethod)) throw new \Exception("Error Processing Request [no method]", 3);
		
		$object->$imethod($ipara);
	}
}