<?php

namespace App\Helpers\Countries;

interface ICountries
{
	/**
	 * @return ["name1", "name2", ...]
	 */
	public function getAll() : array;
}