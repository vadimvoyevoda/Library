<?php

namespace App\Helpers\Data;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Translation;
use App\Helpers\Connection\ConnectionService;
use Doctrine\ORM\EntityManager;

class BooksParser
{
	private $baseurl = "https://raw.githubusercontent.com/benoitvallon/100-best-books/master/books.json";

	private $entityManager = null;

	public function __construct(EntityManager $entityManager){
		$this->entityManager = $entityManager;
	}

    public function getBooks()
    {
        $connection_service = ConnectionService::getConnectionService("json");
    	$books = $connection_service->connect($this->baseurl);
        
    	return $books;
    }

    public function saveBooks()
    {
    	$books = $this->getBooks();
    	
        $i = 0;
        foreach ($books as $rbook) {

        	$book = new Book();
            $author = new Author();
            
            $name = "Unknown";
            $lastName = "";

            $pos = strripos($rbook->author, " ");
            if ($pos !== false) {
                $name = substr($rbook->author, 0, $pos);
                $lastName = substr($rbook->author, $pos+1);
            }

            $author->setName($name);
            $author->setLastName($lastName);
            $author->setCountry($rbook->country);
            
            $this->entityManager->persist($author);            
            
            $languages = explode(",", $rbook->language);
            $translations = array();
            foreach ($languages as $key => $lang) {
            	if (!empty($lang)) {
                    $translation = new Translation();
                    $translation->setLanguage(trim($lang));
    
                    $translations[] = $translation;
                }
            }

            $date = new \DateTime();
            $date->setDate((int)$rbook->year, 1, 1);

            $book->setTitle($rbook->title);
            $book->setPublishDate($date);
            $book->setAuthor($author);

            foreach ($translations as $key => $translation) {
                $book->addTranslation($translation);
            }            

            $this->entityManager->persist($book);
            $this->entityManager->flush();

            if( $i == 100 ) {
            	break;
            } else { 
            	++$i;
            }
        }

    }
}