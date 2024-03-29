<?php
// import des classes
require_once('Class/Articles.php');
require_once('Class/Biblio.php');
require_once('Class/Users.php');

// Création de la bilbiothèque
$biblio = new Biblio("Bibliothèque de Bordeaux");

// Création d'un client pour vérifier si le message d'erreur apparaît bien si le client entré dans le form existe déjà
// $client = new Client("Carol Rider","f","carider@mail.com","1212",55);
// $biblio->addClient($client);

$accountCreated = false;

// Récupération des information entrées dans le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';

    // Vérifier si le client existe
    $clientExists = $biblio->verifClientExists($name, $email); 

    if (!$clientExists) {
        $validateCardNumber = false;
        while ($validateCardNumber=false){
            // Génération aléatoire d'un numéro de carte
            $cardNumber = rand(1000, 9999);
            // Vérifier si le numéro de carte existe pour un autre client
            $cardNumberExists = $biblio->verifCardNumerExists($cardNumber);
            if (!$cardNumberExists){
                $newClient = new Client($name, $address, $email, $tel, $cardNumber);
                // Ajouter le client à la bibliothèque
                $biblio->addClient($newClient); 
                $accountCreated = true;
                $validateCardNumber = true;
            }
        }  
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Bienvenue</h2>

    <!-- Fromulaire de création de compte (=client) -->
    <form method="post" action="index.php" id="form">
        <label for="name">Nom :</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="address">Adresse :</label><br>
        <input type="text" id="address" name="address" required><br>
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="tel">Téléphone :</label><br>
        <input type="text" id="tel" name="tel" required><br>
        <input type="submit" value="Créer un compte">
    </form>

</body>
</html>

<?php 
    // Vérifier si des information ont été envoyées
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if ($accountCreated){
            // Affichage d'un message de succès si le compte à été créé
            echo '<p class="successMessage">Votre compte a été créé avec succès!</p>';
        }   
        else {
            // Affichage d'un message d'échec si le client possède déjà un compte
            echo '<p class="successMessage">Vous possédez déjà un compte.</p>';
        }
    }
?>