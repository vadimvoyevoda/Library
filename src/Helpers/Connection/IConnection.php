<?php

namespace App\Helpers\Connection;

interface IConnection
{
	public function connect(string $url);
}