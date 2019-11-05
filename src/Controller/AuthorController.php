<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AuthorController extends AbstractController
{
    /**
     * @Route("/dashboard/author/new", name="new_author")
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
    
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('author/new.html.twig', [
            'controller_name' => 'AuthorController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/dashboard/authors", name="authors")
     */
    public function index()
    {
    	$repository = $this->getDoctrine()->getRepository(Author::class);
    	$authors = $repository->findAll();

    	return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $authors
        ]);
    }
}
