<?php

namespace App\Helpers\Data;

use App\Helpers\Connection\ConnectionService;

class BooksParser
{
	private $baseurl = "https://raw.githubusercontent.com/benoitvallon/100-best-books/master/books.json";

    private const ALL_BOOKS = 0;

	public function getBooks(int $count = self::ALL_BOOKS)
    {
        $connection_service = ConnectionService::getConnectionService("json");
    	$books = $connection_service->connect($this->baseurl);
        
        if (self::ALL_BOOKS != $count) {
           return array_slice($books,0,$count);
        }        

    	return $books;
    }
}