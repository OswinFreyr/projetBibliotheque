<?php

class Livres {
    protected $titre;
    protected $auteurs = array();
    protected  $datePubli;
    protected $editeur;
    protected $genres = array();

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
        echo "publié le " . $this->datePubli . " par " . $this->editeur . ". ";
    }
}