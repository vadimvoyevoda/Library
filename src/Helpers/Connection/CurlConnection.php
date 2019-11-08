<?php

namespace App\Helpers\Connection;

use App\Helpers\Singleton;
use App\Helpers\Connection\IConnection;

class CurlConnection extends Singleton implements IConnection
{	
	public function connect(string $url)
	{
		$ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
	}
}