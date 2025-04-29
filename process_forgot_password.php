<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (empty($email)) {
        header("Location: forgot_password.php?error=Please enter your email");
        exit();
    }

    try {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            // In a real application, generate a reset token and send an email
            // For now, we'll just simulate it
            header("Location: forgot_password.php?success=Password reset link sent to your email");
            exit();
        } else {
            header("Location: forgot_password.php?error=Email not found");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: forgot_password.php?error=Database error");
        exit();
    }
}
?>