<?php
session_start();
header('Content-Type: application/json');

// Get user data from request
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data || !isset($data['uid'], $data['name'], $data['email'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data']);
    exit;
}

// Set session variables
$_SESSION['user_id'] = $data['uid'];
$_SESSION['user_name'] = $data['name'];
$_SESSION['user_email'] = $data['email'];
$_SESSION['user_picture'] = isset($data['picture']) ? $data['picture'] : '';

echo json_encode(['success' => true, 'message' => 'Session updated']);
?>