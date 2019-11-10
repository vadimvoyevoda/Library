# Library
Symfony 4 project for Library Catalogue

Book Catalogue Application:

Sections:
1. Customers service :
- Books List with Book title, Author FullName, Publish Date and Translations.
- You can see Author page (click on Author name) with Author FullName, Country and Current Author Books.
- You can filter books by Book Title, Author, Translation in the filters row
(AJAX if you typing, and with Reloading page after Search btn click)

2. Dashboard (for managing Books and Authors):
- You must LogIn to Dashboard panel (click on Login link in the header)
Username : demo
Password : demo

- There are two sections:
+ Authors
+ Books

Authors and Books are parsed from Books json file
https://raw.githubusercontent.com/benoitvallon/100-best-books/master/books.json
(Some Author countries and Book translations can be different than in restcountries.eu)

! To parse books you need uncomment method parseBooks() in Dashboard Controller.

Countries and Languages are getted from https://restcountries.eu/ using API

In Folder Helpers there are custom interfaces and classes for work 
with connections, receiving data and saving to DB.
