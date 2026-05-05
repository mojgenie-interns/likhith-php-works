<?php

class Book
{
    public $title;
    public $author;
    public $isAvailable;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
        $this->isAvailable = true;
    }
}

class Library
{
    private $books = [];

    public function addBook()
    {
        $title = readline("Enter book title: ");
        $author = readline("Enter author: ");

        // Check duplicate
        foreach ($this->books as $book) {
            if (strtolower($book->title) == strtolower($title)) {
                echo "Book already exists!\n";
                return;
            }
        }

        $this->books[] = new Book($title, $author);
        echo "Book added successfully!\n";
    }

    public function borrowBook()
    {
        $title = readline("Enter book title to borrow: ");

        foreach ($this->books as $book) {
            if (strtolower($book->title) == strtolower($title)) {

                if ($book->isAvailable) {
                    $book->isAvailable = false;
                    echo "You borrowed '{$book->title}'\n";
                } else {
                    echo "Book already borrowed!\n";
                }
                return;
            }
        }

        echo "Book not found!\n";
    }

    public function returnBook()
    {
        $title = readline("Enter book title to return: ");

        foreach ($this->books as $book) {
            if (strtolower($book->title) == strtolower($title)) {

                if (!$book->isAvailable) {
                    $book->isAvailable = true;
                    echo "Book returned successfully!\n";
                } else {
                    echo "Book was not borrowed!\n";
                }
                return;
            }
        }

        echo "Book not found!\n";
    }

    public function showBooks()
    {
        if (empty($this->books)) {
            echo "No books in library\n";
            return;
        }

        echo "\n===== BOOK LIST =====\n";

        foreach ($this->books as $book) {
            $status = $book->isAvailable ? "Available" : "Borrowed";

            echo "Title: {$book->title} | Author: {$book->author} | Status: {$status}\n";
        }
    }
}

$library = new Library();

while (true) {
    echo "\n===== LIBRARY MENU =====\n";
    echo "1. Add Book\n";
    echo "2. Borrow Book\n";
    echo "3. Return Book\n";
    echo "4. View Books\n";
    echo "5. Exit\n";

    $choice = readline("Enter your choice: ");

    switch ($choice) {
        case 1:
            $library->addBook();
            break;

        case 2:
            $library->borrowBook();
            break;

        case 3:
            $library->returnBook();
            break;

        case 4:
            $library->showBooks();
            break;

        case 5:
            echo "Exiting...\n";
            exit;

        default:
            echo "Invalid choice!\n";
    }
}