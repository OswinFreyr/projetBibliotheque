<?php
// Imports
require_once 'Articles.php';
require_once 'Biblio.php';
//________________________________________________________________________________________________________



class User {
    // Classe générale, les attributs sont partagés avec Librarian et Client
    protected String $name;
    protected String $address;
    protected String $email;
    protected String $tel;

    public function __construct(String $name, String $address, String $email, String $tel){
        $this->tel = $tel;
        $this->email = $email;
        $this->address = $address;
        $this->name = $name;
    }

    public function displayAllArticles(Biblio $biblio){
        echo "Tous nos livres : \n";
        $biblio->displayBooks();
        echo "\n \n Tous nos disques : \n";
        $biblio->displayDiscs();
    }

}


class Client extends User {
    protected bool $isAccount = true;
    protected $cardNumber;

    protected $booksBorrowed = array();

    protected $discsBorrowed = array();
    
    public function __construct(String $name,String $address,String $email,String $tel,int $cardNumber){
        parent::__construct( $name, $address, $email, $tel);
        $this->cardNumber = $cardNumber;
    }

    public function getDetails(){

        //verif si emprunts
        if (empty($this->booksBorrowed)){
            // verif si compte
            if ($this->isAccount){
                echo "Nom : . $this->name  \n  
                Adress : $this->address  \n  
                Tel : $this->tel  \n  
                Email : $this->email  \n  
                $this->name possède un compte. \n 
                Numero carte client : $this->cardNumber \n$
                this->name n'a pas encore emprunté d'articles. ";
            }
            else {              
                echo "Nom : . $this->name  \n  
                Adress : $this->address  \n  
                Tel : $this->tel  \n  
                Email : $this->email  \n  
                $this->name ne possède pas de compte.\n
                $this->name n'a pas encore emprunté d'articles. ";
            }          
        }
        else{
            if (!$this->isAccount){
                echo "Nom : . $this->name  \n  
                Adress : $this->address  \n  
                Tel : $this->tel  \n  
                Email : $this->email  \n  
                $this->name possède un compte. \n 
                Numero carte client : $this->cardNumber \n
                Articles empruntés : " . $this->booksBorrowed;
            }
            else {
                echo "Nom : . $this->name  \n  
                Adress : $this->address  \n  
                Tel : $this->tel  \n  
                Email : $this->email  \n 
                this->name ne possède pas de compte. \
                Articles empruntés : " . $this->booksBorrowed;
            }
            
        }
    }

    // afficher un detail
    public function getDetail($detail){
        return $this->$detail;
    }

    // modifier un detail
    public function setDetail ($var,$modif){
        $this->$var = $modif;
    }

    public function deleteAccount(){
        if($this->isAccount==true){
            $this->isAccount = false;
            $this->cardNumber = null;
            echo "Le compte a été supprimé.";
        }
        else {
            echo "Vous ne possédez pas de compte.";
        }
    }

    public function bookBorrow ($title, Biblio $biblio){

        foreach ($biblio->books as $index => $book) {
            if ($book->title === $title && $book->isBorrowed == false) {
                $biblio->books[$index]->isBorrowed = true;
                array_push($this->booksBorrowed,$book);
                return "Vous avez emprunté \"$title\".";
            }
        }
        return "Le livre \"$title\" n'est pas disponible pour l'emprunt."; 
    }

    public function discBorrow ($title, Biblio $biblio){

        foreach ($biblio->discs as $index => $disc) {
            if ($disc->title === $title && $disc->isBorrowed == false) {
                $biblio->discs[$index]->isBorrowed = true;
                array_push($this->discsBorrowed,$disc);
                return "Vous avez emprunté \"$title\".";
            }
        }
        return "Le disque \"$title\" n'est pas disponible pour l'emprunt."; 
    }


    public function bookRender($title, $biblio) {
        foreach ($this->booksBorrowed as $index => $book) {
            if ($book->title === $title) {
                foreach ($biblio->books as $indexBiblio => $livreBiblio) {
                    if ($livreBiblio->title === $title) {
                        $biblio->books[$indexBiblio]->isBorrowed = false;
                        unset($this->booksBorrowed[$index]);
                        return "Vous avez rendu \"$title\".";
                    }
                }
            }
        }
        return "Vous n'aviez pas emprunté \"$title\".";
    }
}

class Librarian extends Client {
    protected bool $islibrarian = true;

    public function bookRegister ($title,$author,$datePubli,$editor,$genres,Biblio $biblio){
        // Créer un nouvel objet Livres()
        $livre = new Books($title,$author,$datePubli,$editor,$genres);
        // Ajouter le livre à la bibliothèque
        array_push($biblio->books,$livre);
        echo "Le livre $livre->title a été ajouté avec succès.\n";
    }

    public function discRegister ($title,$datePubli,$genres,$artist,Biblio $biblio){
        // Créer un nouvel objet Discs()
        $disc = new Discs($title,$datePubli,$genres,$artist);
        // Ajouter le disque à la bibliothèque
        array_push($biblio->discs,$disc);
        echo "Le livre $disc->title a été ajouté avec succès.\n";
    }
}


//___________________________  TESTS PERSONNES  _______________________________

echo "\n user : \n";
$user = new User("Patrick Balkany","13 rue de la Fraude","jepossededesthunes@gmail.com","07.56.68.37.19");
// print_r($user);
echo "\n";

echo "\n client : \n";
$client = new Client ("Valérie Pécresse","Métro parisien","jaiunegigadette@gmail.com","06.45.23.86.97",599755);
// print_r($client);
echo "\n";
// echo "Infos client : \n";
// $client->getDetails();
// echo($client->getDetail("name"));

echo "\n librarian : \n";
$librarian = new Librarian("Marlène Schiappa","12 rue de la pose","jijoijoi@gmail.com","09.45.69.78.45",84616);
// print_r($librarian);
// $librarian->getDetails();

// ________________________ TESTS ARTICLES ________________________

echo "\n new book : \n";
$book = new Books("Le Papier Peint Jaune", ["Charlotte Gilman"], 1892,"Tendance Négative",["Essai","Horreur"]);
// print_r($book);

echo "\n new disc : \n";
$disc = new Discs("Life and Love", ["Skinshape"], 2017,["Indie","Alternative"]);
// print_r($disc);

// ________________________ TESTS AJOUTS ELEMENTS BIBLIO __________________________

echo "\n new biblio : \n";
$biblio = new Biblio("BFM");
$biblio->addBook($book);
$biblio->addClient($client);
$biblio->addDisc($disc);
$biblio->addLibrarian($librarian);
// print_r($biblio);

// ______________________ TEST EMPRUNT RENDU __________________________

echo "\n\n\n\n\n\n emprunt : \n";
$client->bookBorrow("Le Papier Peint Jaune",$biblio);
print_r($client);
print_r($biblio);
$$client->bookRender("Le Papier Peint Jaune",$biblio);
print_r($client);
print_r($biblio);
// $biblio->displayDiscs();