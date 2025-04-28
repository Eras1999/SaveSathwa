<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSathwa | AI-Powered Animal Rescue & Assistance Platform</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo5.png">
    
    <link rel="stylesheet" href="css/login.css">
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