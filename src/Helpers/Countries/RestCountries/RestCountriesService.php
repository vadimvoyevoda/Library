<?php

namespace App\Helpers\Countries\RestCountries;

use App\Helpers\Connection\ConnectionService;

class RestCountriesService
{
	private const BASEURL = "https://restcountries.eu/rest/v2";
    private const ALL_COUNTRIES_NAMES_ENDPOINT = "/all?fields=name";
    private const ALL_COUNTRIES_LANGUAGES_ENDPOINT = "/all?fields=languages";

    public function getCountries()
    {
        $connection_service = ConnectionService::getConnectionService("curl");
    	$countries_json = $connection_service->connect(self::BASEURL . self::ALL_COUNTRIES_NAMES_ENDPOINT);
        $countries = json_decode($countries_json);

        if (empty($countries)) {
    		return false;
    	}
    	return $countries;
    }

    public function getLanguages()
    {
        $connection_service = ConnectionService::getConnectionService("curl");
        $countries_languages_json = $connection_service->connect(self::BASEURL . self::ALL_COUNTRIES_LANGUAGES_ENDPOINT);
        $countries_languages = json_decode($countries_languages_json);

        if (empty($countries_languages)) {
            return false;
        }   
        return $countries_languages;
    }
}