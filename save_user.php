<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "savesathwa"; // Replace with your database name

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

// Get user data from request
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data || !isset($data['uid'], $data['name'], $data['email'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data']);
    exit;
}

$uid = $data['uid'];
$name = $data['name'];
$email = $data['email'];
$picture = isset($data['picture']) ? $data['picture'] : null;
$created = date('Y-m-d H:i:s');
$modified = $created;

try {
    // Check if user already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE oauth_uid = :uid");
    $stmt->execute(['uid' => $uid]);
    $userExists = $stmt->fetch();

    if ($userExists) {
        // Update existing user
        $stmt = $conn->prepare("UPDATE users SET name = :name, email = :email, picture = :picture, modified = :modified WHERE oauth_uid = :uid");
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'picture' => $picture,
            'modified' => $modified,
            'uid' => $uid
        ]);
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (oauth_provider, oauth_uid, name, email, picture, created, modified) 
                                VALUES ('google', :uid, :name, :email, :picture, :created, :modified)");
        $stmt->execute([
            'uid' => $uid,
            'name' => $name,
            'email' => $email,
            'picture' => $picture,
            'created' => $created,
            'modified' => $modified
        ]);
    }
    echo json_encode(['success' => true, 'message' => 'User data saved']);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}

$conn = null;
?>