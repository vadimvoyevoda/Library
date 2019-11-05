<?php

namespace App\Controller;

use App\Helpers\Singleton;
use App\Helpers\Countries\RestCountries\RestCountriesAdapter;
use App\Helpers\Countries\RestCountries\RestCountriesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
	/**
     * @Route("/", name="main")
     */
    public function index()
    {	
    	return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
