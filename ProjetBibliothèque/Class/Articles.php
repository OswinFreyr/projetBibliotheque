<?php

abstract class Articles {
    protected $titre;
    protected $datePubli;
    protected $genres = array();
}

class Livres extends Articles {
    protected $auteurs = array();
    protected $editeur;

    public function __construct($titre, $auteurs, $datePubli, $editeur, $genres) {
        $this->titre = $titre;
        $this->auteurs = $auteurs;
        $this->datePubli = $datePubli;
        $this->editeur = $editeur;
        $this->genres = $genres;
    }

    public function afficherDetails() {
        echo "Le livre " . $this->titre . " écrit par : ";
        foreach ($this->auteurs as $auteur) {
            echo $auteur .", ";
        }
        echo "publié en " . $this->datePubli . " par " . $this->editeur . ". \nC'est un livre de :";
        foreach ($this->genres as $genre) {
            echo " " . $genre ;
        }
        echo ". ";
    }
}

class Disques extends Articles {
    protected $artistes = array();

    public function __construct($titre, $artistes, $datePubli, $genres) {
        $this->titre = $titre;
        $this->artistes = $artistes;
        $this->datePubli = $datePubli;
        $this->genres = $genres;
    }

    public function afficherDetails() {
        echo "Le livre " . $this->titre . " écrit par : ";
        foreach ($this->artistes as $artiste) {
            echo $artiste .", ";
        }
        echo "publié le " . $this->datePubli . "\n";
    }
}

$l1 = new Livres("SDA", ["JRR Tolkien"], 1975, "none", ["Fiction", "Heroic Fantasy"]);
$l1->afficherDetails();