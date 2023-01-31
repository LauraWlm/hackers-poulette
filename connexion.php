<?php

// Connect to database
$host = 'localhost';
$dbname = 'hackers-poulette';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}
?>