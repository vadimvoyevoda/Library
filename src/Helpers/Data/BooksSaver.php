<?php

namespace App\Helpers\Data;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Translation;
use App\Helpers\Data\ISaver;
use Doctrine\ORM\EntityManager;

class BooksSaver implements ISaver
{
	private $entityManager = null;

	public function __construct(EntityManager $entityManager){
		$this->entityManager = $entityManager;
	}

	public function save($data){

		foreach ($data as $book) {

			// get existing Author or create new
        	$author = $this->entityManager
        	               ->getRepository(Author::class)
        	               ->findOneBy(array(
                                'name' => $book['author']['name'],
                                'last_name' => $book['author']['lastName'],
                                'country' => $book['author']['country'],
                            ));
                            
            if( empty($author) ){
                $author = new Author();
                $author->setName($book['author']['name']);
                $author->setLastName($book['author']['lastName']);
                $author->setCountry($book['author']['country']);

                $this->entityManager->persist($author);
            }
                 
            // create Translations       
            $translations = array();
            foreach ($book['translations'] as $lang) {
            	if (!empty($lang)) {
                    $translation = new Translation();
                    $translation->setLanguage(trim($lang));

                    $translations[] = $translation;
                }
            }

            // get DateTime from Year
            $date = new \DateTime();
            $date->setDate((int)$book['publishYear'], 1, 1);

            $newBook = new Book();
            $newBook->setTitle($book['title']);
            $newBook->setPublishDate($date);
            $newBook->setAuthor($author);

            foreach ($translations as $key => $translation) {
                $newBook->addTranslation($translation);
            }            

            $this->entityManager->persist($newBook);
            $this->entityManager->flush();
        }
	}
}