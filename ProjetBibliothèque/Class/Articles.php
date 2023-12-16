<?php

abstract class Articles {
    public $title;
    public $datePubli;
    public $genres = array();

    public $isBorrowed = false;
}

class Books extends Articles {
    protected $authors = array();
    protected $editor;

    public function __construct($title, $authors, $datePubli, $editor, $genres) {
        $this->title = $title;
        $this->authors = $authors;
        $this->datePubli = $datePubli;
        $this->editor = $editor;
        $this->genres = $genres;
    }

    public function displayDetails() {
        echo "Le livre " . $this->title . " écrit par : ";
        foreach ($this->authors as $author) {
            echo $author .", ";
        }
        echo "publié en " . $this->datePubli . " par " . $this->editor . ". \nC'est un livre de :";
        foreach ($this->genres as $genre) {
            echo " " . $genre ;
        }
        echo ". \n";
    }

    public function getDetail ($nom){
        return $this->$nom;
    }

    public function setDetail ($var , $modif){
        $this->$var = $modif;
    }
}

class Discs extends Articles {
    protected $artists = array();

    public function __construct($title, $artists, $datePubli, $genres) {
        $this->title = $title;
        $this->artists = $artists;
        $this->datePubli = $datePubli;
        $this->genres = $genres;
    }

    public function displayDetails() {
        echo "Le disque " . $this->title . " composé par : ";
        foreach ($this->artists as $artist) {
            echo $artist .", ";
        }
        echo "publié le " . $this->datePubli . "\nC'est un disque de :";
        foreach ($this->genres as $genre) {
            echo " " . $genre ;
        }
        echo ". \n";
    }

    public function getDetail ($nom){
        return $this->$nom;
    }

    public function setDetail ($var , $modif){
        $this->$var = $modif;
    }
}

// $l1 = new Books("SDA", ["JRR Tolkien"], 1975, "none", ["Fiction,", "Heroic Fantasy"]);
// $l1->displayDetails();
// $d1 = new Discs("BG3 Soundtrack", ["Boris Slavov"], 2023, ["Jeux Videos"]);
// $d1->displayDetails();