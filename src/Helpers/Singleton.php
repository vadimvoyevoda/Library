<?php

namespace App\Helpers;

abstract class Singleton
{
	private static $instances = null;

	final public static function getInstance()
	{
		$class = get_called_class();
		
		if (!isset(self::$instances[$class])) {
			self::$instances[$class] = new $class;
		}

		return self::$instances[$class];
	}

	private function __construct() {}
	private function __clone() {}
	private function __wakeup() {}
}