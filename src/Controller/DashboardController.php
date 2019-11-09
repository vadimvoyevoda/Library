<?php

namespace App\Controller;

use App\Helpers\Data\BooksParser;
use App\Helpers\Data\BooksParserAdapter;
use App\Helpers\Data\BooksSaver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index()
    {
        return $this->render('dashboard/index.html.twig', [            
        ]);
    }

    /**
     * @Route("/dashboard/parseBooks", name="parse")
     */
    // public function parseBooks()
    // {	
    // 	$booksCount = 100;
    // 	$bookParserAdapter = new BooksParserAdapter(new BooksParser(), $booksCount);
    //     $books = $bookParserAdapter->getBooks();

    //     $booksSaver = new BooksSaver($this->getDoctrine()->getManager());
    //     $booksSaver->save($books);

    //     return $this->redirectToRoute('dashboard');
    // }
}
