<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = filter_var($_POST['uid'], FILTER_SANITIZE_STRING);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $photo_url = filter_var($_POST['photo_url'], FILTER_SANITIZE_URL);

    if (empty($uid) || empty($name) || empty($email)) {
        header("Location: login.php?error=Missing Google user data");
        exit();
    }

    try {
        // Check if user exists by UID or email
        $stmt = $pdo->prepare("SELECT id, name FROM users WHERE uid = ? OR email = ?");
        $stmt->execute([$uid, $email]);
        $user = $stmt->fetch();

        if ($user) {
            // User exists, update details
            $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, photo_url = ? WHERE id = ?");
            $stmt->execute([$name, $email, $photo_url, $user['id']]);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $name;
        } else {
            // New user, insert into database
            $stmt = $pdo->prepare("INSERT INTO users (uid, name, email, photo_url) VALUES (?, ?, ?, ?)");
            $stmt->execute([$uid, $name, $email, $photo_url]);
            $user_id = $pdo->lastInsertId();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $name;
        }

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        header("Location: login.php?error=Database error");
        exit();
    }
}
?>