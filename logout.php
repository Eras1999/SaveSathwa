<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out</title>
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-auth-compat.js"></script>
    <script src="firebase_config.js" defer></script>
</head>
<body>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const auth = firebase.auth();
            auth.signOut()
                .then(() => {
                    console.log('User signed out from Firebase');
                    // Redirect to login page after signing out
                    window.location.href = 'login.php';
                })
                .catch((error) => {
                    console.error('Sign out error:', error);
                    // Redirect even if there's an error to ensure flow continues
                    window.location.href = 'login.php';
                });
        });
    </script>
</body>
</html>