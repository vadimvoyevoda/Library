<?php

namespace App\Helpers\Connection;

use App\Helpers\Singleton;
use App\Helpers\Connection\IConnection;

class JsonConnection extends Singleton implements IConnection
{	
	public function connect(string $url)
	{
		$jsonResult = file_get_contents($url);
		$result = json_decode($jsonResult);

        return $result;
	}
}