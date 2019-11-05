<?php

namespace App\Helpers\Countries\RestCountries;

use App\Helpers\Countries\ISample;
use App\Helpers\Countries\RestCountries\RestCountriesService;

class RestCountriesLanguagesAdapter implements ISample
{
	private $service;

	public function __construct(RestCountriesService $rest_countries_service)
	{
		$this->service = $rest_countries_service;
	}

	public function getAll() : array
	{
		$languages_names = array();
		$countries_languages = $this->service->getLanguages();		
		
	    foreach ($countries_languages as $country_languages_item) {
            foreach ($country_languages_item->languages as $country_language) {
                if (!isset($languages_names[$country_language->name])) {
                    $languages_names[$country_language->name] = $country_language->name;
                }
            }            
        }

        sort($languages_names);     
		return $languages_names;
	}
}