<?php

abstract class Articles {
    protected $title;
    protected $datePubli;
    protected $genres = array();
}

class Livres extends Articles {
    public $authors = array();
    public $editor;

    public function __construct($title, $authors, $datePubli, $editor, $genres) {
        $this->title = $title;
        $this->authors = $authors;
        $this->datePubli = $datePubli;
        $this->editor = $editor;
        $this->genres = $genres;
    }

    public function afficherDetails() {
        echo "Le livre " . $this->title . " écrit par : ";
        foreach ($this->authors as $author) {
            echo $author .", ";
        }
        echo "publié en " . $this->datePubli . " par " . $this->editor . ". \nC'est un livre de :";
        foreach ($this->genres as $genre) {
            echo " " . $genre ;
        }
        echo ". ";
    }
}

class Disques extends Articles {
    public $artists = array();

    public function __construct($title, $artists, $datePubli, $genres) {
        $this->title = $title;
        $this->artists = $artists;
        $this->datePubli = $datePubli;
        $this->genres = $genres;
    }

    public function afficherDetails() {
        echo "Le livre " . $this->title . " écrit par : ";
        foreach ($this->artists as $artist) {
            echo $artist .", ";
        }
        echo "publié le " . $this->datePubli . "\n";
    }
}

$l1 = new Livres("SDA", ["JRR Tolkien"], 1975, "none", ["Fiction", "Heroic Fantasy"]);
$l1->afficherDetails();
$d1 = new Discs("BG3 Soundtrack", ["Boris Slavov"], 2023, ["Video Game"]);
$d1->afficherDetails();