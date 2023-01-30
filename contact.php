<!DOCTYPE html>
<html>
 
<head>
    <title>Hackers Poulette</title>
</head>
 
<body>


<?php
if (empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['email']) || empty($_POST['comment'])) {
    echo '<p class="erreur">Attention, vous devez remplir tous les champs</p>';
} else {
    // connexion à la base
    require_once("connexion.php");

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