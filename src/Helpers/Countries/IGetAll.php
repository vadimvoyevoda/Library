<?php

namespace App\Helpers\Countries;

interface IGetAll
{
	/**
	 * @return ["name1", "name2", ...]
	 */
	public function getAll() : array;
}