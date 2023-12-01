<?php

abstract class Articles {
    public $title;
    public $datePubli;
    public $genres = array();
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

class Disc extends Articles {
    protected $artists = array();

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

$l1 = new Books("SDA", ["JRR Tolkien"], 1975, "none", ["Fiction", "Heroic Fantasy"]);
$l1->afficherDetails();