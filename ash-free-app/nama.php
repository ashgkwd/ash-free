<?php
require_once('ash-free-base/AshFree.php');

class Nama implements \AshFree\App
{
	public function get($para)
	{
		echo "Welcome <b>get</b> executed successfully";
	}

	public function post($para)
	{
		
	}

	public function ajax($para)
	{
		
	}

	public function websocket($para)
	{
		
	}
}