<?php

namespace App\Helpers\Connection;

use App\Helpers\Connection\IConnectionService;
use App\Helpers\Connection\CurlConnection;
use App\Helpers\Connection\JsonConnection;

class ConnectionService implements IConnectionService
{	
	public static function getConnectionService(string $type) : IConnection
	{
		switch ($type) {
			case "curl":
			    return CurlConnection::getInstance();
			case "json":
			    return JsonConnection::getInstance();
			default:
			    return false;
		}
		
	}
}