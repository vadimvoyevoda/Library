<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Knp\Component\Pager\PaginatorInterface;

class AuthorController extends AbstractController
{
    private $perPage = 10;

    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @Route("/dashboard/authors", name="authors")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $name = $request->query->get("name");

    	$repository = $this->getDoctrine()->getRepository(Author::class);
    	$allAuthors = $repository->findAll($name);

        $authors = $paginator->paginate(
            $allAuthors,
            $request->query->getInt('page', 1),
            $this->perPage
        );

    	return $this->render('author/index.html.twig', [
            'authors' => $authors
        ]);
    }

    /**
     * @Route("/dashboard/authors/new", name="new_author")
     */
    public function new(Request $request)
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $author = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($author);
            $entityManager->flush();
    
            return $this->redirectToRoute('authors');
        }

        return $this->render('author/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/dashboard/authors/edit/{author_id}", name="edit_author")
     */
    public function edit(int $author_id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $author = $entityManager->getRepository(Author::class)->find($author_id);

        if (empty($author)) {
            throw $this->notFoundException();
        }

        $form = $this->createForm(AuthorType::class, $author);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $entityManager->flush();
    
            return $this->redirectToRoute('authors');
        }

        return $this->render('author/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/dashboard/authors/delete/{author_id}", name="delete_author")
     */
    public function delete(int $author_id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $author = $entityManager->getRepository(Author::class)->find($author_id);
        
        if (empty($author)) {
            throw $this->notFoundException();
        }
        
        $entityManager->remove($author);
        $entityManager->flush();
    
        return $this->redirectToRoute('authors');
    }

    /**
     * @Route("/author/{author_id}", name="author")
     */
    public function author(int $author_id, Request $request, PaginatorInterface $paginator, BookController $bookController)
    {
        $repository = $this->getDoctrine()->getRepository(Author::class);
        $author = $repository->find($author_id);

        $books = $paginator->paginate(
            $author->getBooks(),
            $request->query->getInt('page', 1),
            $bookController->getPerPage()
        );

        return $this->render('author/author.html.twig', [
            'author' => $author,
            'books'  => $books

        ]);
    }
}
