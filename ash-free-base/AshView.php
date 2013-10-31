<?php
/*
* Author: Ashish A Gaikwad <ash.gkwd@gmail.com>
* App: Ash Free
* Copyright: 2013 All Rights Reserved
* File: /AshView.php
* Purpose: All Output data is sent through this class including JSON, HTML, TEXT.
*/

namespace AshFree\Base;

class AshView
{
	public function html($view_, $data_=[])
	{
		if(file_exists('ash-free-views/'.$view_.'.php'))
		{
			extract($data_);
			require('ash-free-views/'.$view_.'.php');
		}
		else
		{
			throw new \Exception("Error Processing Request : BadView 1", 1);
		}
	}

	public function json($output=[])
	{
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($output);
	}

	public function text($output='')
	{
		header('Content-type: application/json; charset=utf-8');
		echo $output;
	}
}