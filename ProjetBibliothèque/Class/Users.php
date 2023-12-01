<?php


// Imports

require 'Articles.php';
require 'Biblio.php';

//________________________________________________________________________________________________________

abstract class Users {
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
        echo "Nom : . $this->name  \n  Adress : $this->address  \n  Tel : $this->tel  \n  Email : $this->email  \n  Role : $this->role";
    }

    public function setDetails ($var,$modif){
        $this->$var = $modif;
    }

    public function bookRegister ($title,$author,$datePubli,$editor,$genres,$biblio){
        $livre = new Livres($title,$author,$datePubli,$editor,$genres);
        array_push($biblio,$livre);
        echo "Le livre $livre->title a été ajouté avec succès.\n";
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
    

}