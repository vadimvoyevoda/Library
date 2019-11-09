<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\Common\Collections\ArrayCollection;

class BookController extends AbstractController
{
    private $perPage = 10;

    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @Route("/dashboard/books", name="books")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
    	$books = $this->getFilteredBooks($request, $paginator);
                
    	return $this->render('book/index.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @Route("/dashboard/books/new", name="new_book")
     */
    public function new(Request $request)
    {
    	$book = new Book();
    	$form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()) {
    		$book = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
    		$entityManager->persist($book);
    		$entityManager->flush();

    		return $this->redirectToRoute('books');
    	}

    	return $this->render('book/new.html.twig', [
    		'form' => $form->createView()
    	]);
    }

    /**
     * @Route("/dashboard/books/edit/{book_id}", name="edit_book")
     */
    public function edit(int $book_id, Request $request)
    {
    	$entityManager = $this->getDoctrine()->getManager();
    	$book = $entityManager->getRepository(Book::class)->find($book_id);

        if (empty($book)) {
            throw $this->notFoundException();
        }
    	
    	$form = $this->createForm(BookType::class, $book);

    	$form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

    		return $this->redirectToRoute('books');
    	}

    	return $this->render('book/edit.html.twig', [
    		'form' => $form->createView()
    	]);
    }

    // private function setUniqueTranslations(Book $book)
    // {
    //     $uniqueTranslations = new ArrayCollection();

    //     $translations = $book->getTranslations();
    //     foreach ($translations as $key => $translation) {
    //         if ($uniqueTranslations->contains($translation->getLanguage())) {
    //             $book->removeTranslation($translation);
    //         } else {
    //             $uniqueTranslations->add($translation->getLanguage());
    //         }
    //     }

    //     return $book;
    // }

    /**
     * @Route("/dashboard/books/delete/{book_id}", name="delete_book")
     */
    public function delete(int $book_id)
    {
    	$entityManager = $this->getDoctrine()->getManager();
    	$book = $entityManager->getRepository(Book::class)->find($book_id);

    	if (empty($book)) {
            throw $this->notFoundException();
        }

        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('books');
    }

    /**
     * @Route("/books/filters", name="filter_book")
     */
    public function filter(Request $request, PaginatorInterface $paginator)
    {
        $books = $this->getFilteredBooks($request, $paginator);

        if ($request->isXmlHttpRequest()) {  
            return $this->render('book/list.html.twig', [
                'books' => $books,

            ]);
        }

        return $this->render('book/books.html.twig', [
            'books' => $books
        ]);
    }

    private function getFilteredBooks(Request $request, PaginatorInterface $paginator)
    {
        $bookRepository = $this->getDoctrine()->getManager()->getRepository(Book::class);
        
        $criterias = array();
        $this->addRequestFilter($request, 'title', $criterias);
        $this->addRequestFilter($request, 'author', $criterias);
        $this->addRequestFilter($request, 'translation', $criterias);

        $orderBy = array(
            "b.publish_date" => "DESC",
            "b.title" => "ASC"
        );

        $allBooks = $bookRepository->findByCriterias($criterias, $orderBy);

        $books = $paginator->paginate(
            $allBooks,
            $request->query->getInt('page', 1),
            $this->perPage
        );

        return $books;
    }

    // check if current filter exist in query 
    // then add it filter to searching criterias
    private function addRequestFilter(Request $request, string $criteria, array &$criterias, string $method = "GET")
    {
        $criteriaValue = !empty($method) && $method == "POST" 
                    ? $request->request->get($criteria) 
                    : $request->query->get($criteria);
        
        if (!empty($criteriaValue)) {
            $criterias[$criteria] = $criteriaValue;
        }
    }
}
