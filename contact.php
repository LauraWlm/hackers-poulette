<!DOCTYPE html>
<html>
 
<head>
    <title>Hackers Poulette</title>
</head>
 
<body>


<?php
// Récupération des données du formulaire
$name = $_POST['name'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$comment = $_POST['comment'];

if (empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['email']) || empty($_POST['comment'])) {
    echo '<p class="erreur">Attention, vous devez remplir tous les champs</p>';
} else {
    require_once("connexion.php");
    
// Validation des données

if (empty($name) || strlen($name) < 2 ||  strlen($name) > 255) {
    die("Nom incorrect");
  }
  
  if (empty($firstname) ||  strlen($firstname) < 2 ||  strlen($firstname) > 255) {
    die("Prénom incorrect");
  }
  
  if (empty($email) ||  strlen($email) < 2 || strlen($email) > 255 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Adresse email incorrecte");
  }
  
  if (empty($comment) || strlen($comment) < 255 || strlen($comment) > 1000) {
    die("Commentaire incorrecte minimum 255 caractères");
  }
  
  $name = preg_replace('/[^a-zA-Z0-9\s]/', '', $name);
  $firstname = preg_replace('/[^a-zA-Z0-9\s]/', '', $firstname);
  $email = preg_replace('/[^a-zA-Z0-9@.]/', '', $email);
  $comment = preg_replace('/[^a-zA-Z0-9\s.?,!:-]/', '', $comment);

    // on écrit la requête sql
    $sql = 'INSERT INTO contact_form(name, firstname, emailAddress, comment) VALUES(' . $pdo->quote($_POST['name']) . ','
        . $pdo->quote($_POST['firstname']) . ','
        . $pdo->quote($_POST['email']) . ','
        . $pdo->quote($_POST['comment']) . ')';

    // on insère les informations du formulaire dans la table
    try {
        $pdo->query($sql);
    } catch (Exception $e) {
        echo '<p class="erreur">', $e->getMessage(), '</p>';
    }
    // on affiche le résultat pour le visiteur
    echo '<span class="laclasse qui va bien">Votre message à bien été envoyé !</span>';
}
?>
</body>
 
</html>


<?php



