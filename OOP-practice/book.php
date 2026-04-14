<?php
class Book
{
    public $title;
    public $author;
    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }
    public function showDetails()
    {
        echo "Book: ".$this ->title ." by ".$this ->author;
    }    
}
$b = new Book("Atomic Habits","James Clear");
$b ->showDetails();