<?php

namespace App\Helpers\Connection;

use App\Helpers\Connection\IConnection;

interface IConnectionService
{
	public static function getConnectionService(string $type) : IConnection;
}