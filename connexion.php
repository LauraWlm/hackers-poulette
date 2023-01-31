<?php

// Connect to database
$host = '127.0.0.1 ';
$dbname = 'hackers-poulette';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}
?>