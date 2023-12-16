<?php

require_once('Class/Articles.php');
require_once('Class/Biblio.php');
require_once('Class/Users.php');

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
$client->bookRender("Le Papier Peint Jaune",$biblio);
print_r($client);
print_r($biblio);
// $biblio->displayDiscs();