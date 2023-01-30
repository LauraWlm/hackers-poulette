<?php
// Connexion à la base de données
try {
  $pdo = new PDO("mysql:host=localhost;dbname=hackers-poulette", "root", "");
} catch (PDOException $e) {
  die("Error: " . $e->getMessage());
}

?>