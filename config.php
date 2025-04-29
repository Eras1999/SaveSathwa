<?php
$host = 'localhost';
$dbname = 'savesathwa';
$username = 'root'; // Replace with your phpMyAdmin username
$password = ''; // Replace with your phpMyAdmin password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>