<?php

namespace App\Helpers\Countries\RestCountries;

use App\Helpers\Countries\ISample;
use App\Helpers\Countries\RestCountries\RestCountriesService;

class RestCountriesAdapter implements ISample
{
	private $service;

	public function __construct(RestCountriesService $rest_countries_service)
	{
		$this->service = $rest_countries_service;
	}

	public function getAll() : array
	{
		$countries_names = array();
		$countries = $this->service->getCountries();		
		if (!empty($countries)) {
		    $countries_names = array_column($countries, 'name');
	    }

		return $countries_names;
	}
}