<?php

namespace App\Helpers\Countries\RestCountries;

use App\Helpers\Connection\CurlConnectionService;

class RestCountriesService
{
	private const BASEURL = "https://restcountries.eu/rest/v2";
    private const ALL_COUNTRIES_ENDPOINT = "/all";

    public function getCountries()
    {
        $connection_service = CurlConnectionService::getInstance();
    	$countries = $connection_service->connect(self::BASEURL . self::ALL_COUNTRIES_ENDPOINT);
    	
        if (empty($countries)) {
    		return false;
    	}
    	return $countries;
    }
}