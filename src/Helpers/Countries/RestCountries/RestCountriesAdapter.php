<?php

namespace App\Helpers\Countries\RestCountries;

use App\Helpers\Countries\ICountries;
use App\Helpers\Countries\RestCountries\RestCountriesService;

class RestCountriesAdapter implements ICountries
{
	private $service;

	public function __construct(RestCountriesService $rest_countries_service)
	{
		$this->service = $rest_countries_service;
	}

	public function getAll() : array
	{
		$countries_names = array();

		$countries_json = $this->service->getCountries();
		$countries = json_decode($countries_json);
		
		if (!empty($countries)) {
		    $countries_names = array_column($countries, 'name');
	    }

		return $countries_names;
	}
}