<?php
// Connect to your database
$host = "localhost";
$username = "root"; // your phpmyadmin username
$password = "";     // your phpmyadmin password
$database = "savesathwa";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get JSON data from fetch
$data = json_decode(file_get_contents("php://input"), true);

$firebase_uid = $conn->real_escape_string($data['firebase_uid']);
$name = $conn->real_escape_string($data['name']);
$email = $conn->real_escape_string($data['email']);
$profile_picture = $conn->real_escape_string($data['profile_picture']);

// Check if user already exists
$checkQuery = "SELECT * FROM users WHERE firebase_uid = '$firebase_uid'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) {
    // User already exists, do nothing or update if you want
    echo "success";
} else {
    // Insert new user
    $insertQuery = "INSERT INTO users (firebase_uid, name, email, profile_picture) 
                    VALUES ('$firebase_uid', '$name', '$email', '$profile_picture')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
