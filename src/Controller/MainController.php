<?php

namespace App\Controller;

use App\Controller\BookController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

use App\Helpers\Data\BooksParser;

class MainController extends AbstractController
{
	/**
     * @Route("/", name="home")
     */
    public function index(BookController $bookController, Request $request, PaginatorInterface $paginator)
    {	
    	// $bookParser = new BooksParser($this->getDoctrine()->getManager());
        // $books = $bookParser->saveBooks();

        return $bookController->filter($request, $paginator);
    }
}
