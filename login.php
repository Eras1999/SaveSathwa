<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSathwa | AI-Powered Animal Rescue & Assistance Platform</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo5.png">
    
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-image: url('https://cdnjs.cloudflare.com/ajax/libs/placeholder-loading/0.2.6/placeholder-loading.min.js');
    background-image: url('/savesathwa/img/login/l1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: flex-end; /* Changed from center to flex-end to align to right */
    padding: 20px;
    position: relative;
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);  /* Dark overlay for better readability */
    z-index: 1;
}

.login-container {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
    overflow: hidden;
    position: relative;
    z-index: 2;  /* Place above the overlay */
    margin-right: 100px; /* Add right margin to move it away from the edge */
}

        .header {
            background-color: #f8f9fa;
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        .header h1 {
            color: #333;
            font-size: 24px;
            font-weight: 600;
        }

        .form-container {
            padding: 30px 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #764ba2;
            outline: none;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background-color: #5a72e2;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }

        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #eee;
        }

        .divider span {
            padding: 0 15px;
            color: #777;
            font-size: 12px;
        }

        .social-login {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border-radius: 5px;
            font-weight: 500;
            border: 1px solid #eee;
            color: #333;
            background-color: white;
        }

        .btn-social:hover {
            background-color: #f8f9fa;
        }

        .btn-google {
            color: #ea4335;
        }

        .btn-facebook {
            color: #3b5998;
        }

        .btn-social i {
            margin-right: 10px;
            font-size: 18px;
        }

        .footer {
            text-align: center;
            padding: 15px;
            border-top: 1px solid #eee;
        }

        .footer a {
            color: #667eea;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                max-width: 100%;
            }
            
            .header {
                padding: 20px 15px;
            }
            
            .form-container {
                padding: 20px 15px;
            }
            
            .btn, .form-control {
                padding: 10px;
            }
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="header">
            <h1>Welcome Back</h1>
        </div>
        
        <div class="form-container">
            <form action="process_login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
            
            <div class="divider">
                <span>OR CONTINUE WITH</span>
            </div>
            
            <div class="social-login">
                <a href="google_login.php" class="btn btn-social btn-google">
                    <i class="fab fa-google"></i> Google
                </a>
                <a href="facebook_login.php" class="btn btn-social btn-facebook">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
            </div>
        </div>
        
        <div class="footer">
            <p>Don't have an account? <a href="register.php">Sign Up</a></p>
        </div>
    </div>

    <?php
    // This would be in your process_login.php file
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        
        if (!empty($email) && !empty($password)) {
            // Connect to database
            $db = new mysqli('localhost', 'username', 'password', 'database_name');
            
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }
            
            // Prepare statement to prevent SQL injection
            $stmt = $db->prepare("SELECT id, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                
                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Password is correct, start a new session
                    session_start();
                    
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $user['id'];
                    $_SESSION["email"] = $email;
                    
                    // Redirect to welcome page
                    header("location: dashboard.php");
                } else {
                    // Display an error message if password is not valid
                    $password_err = "The password you entered was not valid.";
                    echo "<script>alert('Invalid password');</script>";
                }
            } else {
                // Display an error message if email doesn't exist
                $email_err = "No account found with that email.";
                echo "<script>alert('No account found with that email');</script>";
            }
            
            $stmt->close();
            $db->close();
        }
    }

    // These would be in separate files for social login
    // google_login.php - Basic structure
    /*
    function googleLogin() {
        // Configure Google API credentials
        $clientID = 'YOUR_GOOGLE_CLIENT_ID';
        $clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
        $redirectUri = 'YOUR_REDIRECT_URI';
        
        // Create Google client
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");
        
        // Redirect to Google authentication page
        $authUrl = $client->createAuthUrl();
        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    }
    */

    // facebook_login.php - Basic structure
    /*
    function facebookLogin() {
        // Configure Facebook SDK
        $fb = new \Facebook\Facebook([
            'app_id' => 'YOUR_FACEBOOK_APP_ID',
            'app_secret' => 'YOUR_FACEBOOK_APP_SECRET',
            'default_graph_version' => 'v12.0',
        ]);
        
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email'];
        $loginUrl = $helper->getLoginUrl('YOUR_CALLBACK_URL', $permissions);
        
        // Redirect to Facebook login page
        header('Location: ' . filter_var($loginUrl, FILTER_SANITIZE_URL));
    }
    */
    ?>
</body>
</html>