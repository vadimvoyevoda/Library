<?php

namespace App\Helpers\Countries;

interface ISample
{
	/**
	 * @return ["name1", "name2", ...]
	 */
	public function getAll() : array;
}