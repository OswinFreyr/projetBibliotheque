<?php

class Biblio {
    public $name;
    public $books = array();
    public $discs = array();
    public $clients = array();
    public $librarians = array();
    
    public function __construct($name) {
        $this->name = $name;
    }
    public function addLibrarian($librarian) {
        array_push($this->librarians, $librarian);
    }
    public function addClient($client) {
        array_push($this->clients, $client);
    }
    public function addBook($book) {
        array_push($this->books, $book);
    }
    public function addDisc($disc) {
        array_push($this->discs, $disc);
    }

    public function displayBooks() {
        foreach( $this->books as $book ) {
            $book->displayDetails();
        }
    }
    public function displayDiscs() {
        foreach( $this->discs as $disc ) {
            $disc->displayDetails();
        }
    }

}