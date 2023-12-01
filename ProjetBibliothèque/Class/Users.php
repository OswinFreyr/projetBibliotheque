<?php


// Imports

require 'Articles.php';
require 'Biblio.php';

//________________________________________________________________________________________________________

abstract class Users {
    // Classe générale, les attributs sont partagés avec Librarians Clients
    protected String $name;
    protected String $address;
    protected String $email;
    protected String $tel;

}

class Librarians extends Users {
    protected String $role;

    public function __construct(String $name, String $address, String $email, String $tel, String $role) {
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
        $this->tel = $tel;
        $this->role = $role;
    }

    public function getDetails(){
        // Récupérer les informations du bibliothéquaire
        echo "Nom : . $this->name  \n  Adress : $this->address  \n  Tel : $this->tel  \n  Email : $this->email  \n  Role : $this->role";
    }

    public function setDetails ($var,$modif){
        // Modifier le contenu de l'attibut $var par $modif
        $this->$var = $modif;
    }

    public function bookRegister ($title,$author,$datePubli,$editor,$genres,$biblio){
        // Créer un nouvel objet Livres()
        $livre = new Books($title,$author,$datePubli,$editor,$genres);
        // Ajouter le livre à la bibliothèque
        array_push($biblio->books,$livre);
        echo "Le livre $livre->title a été ajouté avec succès.\n";
    }

    public function discRegister ($title,$datePubli,$genres,$artist,$biblio){
        // Créer un nouvel objet Discs()
        $disc = new Discs($title,$datePubli,$genres,$artist);
        // Ajouter le livre à la bibliothèque
        array_push($biblio->discs,$disc);
        echo "Le livre $disc->title a été ajouté avec succès.\n";
    }


}

class Clients extends Users {
    protected bool $isAccount;
    protected int $cardNumber;
    
    public function __construct(String $name, String $address, String $email, String $tel,bool $isAccount,int $cardNumber){
        $this->isAccount = $isAccount;
        $this->cardNumber = $cardNumber;
        $this->tel = $tel;
        $this->email = $email;
        $this->address = $address;
        $this->name = $name;
    }

    public function getDetails(){
        echo "Nom : . $this->name  \n  Adress : $this->address  \n  Tel : $this->tel  \n  Email : $this->email  \n  Account ? : $this->isAccount \n Numero carte client : $this->cardNumber ";
    }

    public function setDetails ($var,$modif){
        $this->$var = $modif;
    }

    public function deleteAccount(){
        if($this->isAccount==true){
            $this->isAccount = false;
            echo "Le compte a été supprimé.";
        }
        else {
            echo "Vous ne possédez pas de compte.";
        }
    }

    public function displayAllArticles(Biblios $biblio){
        
    }

}