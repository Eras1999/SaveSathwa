<?php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root'); // Replace with your MySQL username
define('DB_PASSWORD', ''); // Replace with your MySQL password
define('DB_NAME', 'savesathwa');

$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>