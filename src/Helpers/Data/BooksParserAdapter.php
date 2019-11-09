<?php

namespace App\Helpers\Data;

use App\Helpers\Data\IGetBooks;
use App\Helpers\Data\BooksParser;

class BooksParserAdapter implements IGetBooks
{
	private $service;
	private $booksCount;

	public function __construct(BooksParser $booksParser, int $booksCount = 0)
	{
		$this->service = $booksParser;
		$this->booksCount = $booksCount;
	}

	public function getBooks() : array
	{
		$receivedBooks = $this->service->getBooks($this->booksCount);

		$books = array();
		foreach ($receivedBooks as $rbook) {

			// get author data
			$author = array();
			$author['name'] = "Unknown";
            $author['lastName'] = "";

			$pos = strripos($rbook->author, " ");
            if ($pos !== false) {
                $author['name'] = substr($rbook->author, 0, $pos);
                $author['lastName'] = substr($rbook->author, $pos+1);
            }

            $author['country'] = $rbook->country;

            // get translations
            $translations = explode(",", trim($rbook->language));
            
            // create book and append it to books array
            $books[] = array(
            	'title' => $rbook->title,
            	'publishYear' => $rbook->year,
            	'author' => $author,
            	'translations' => $translations
            );
		}

		return $books;
	}
}