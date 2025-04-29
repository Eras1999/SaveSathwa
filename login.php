<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SaveSathwa | AI-Powered Animal Rescue & Assistance Platform</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo5.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-image: url('/savesathwa/img/login/l1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 1rem;
            position: relative;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .login-container {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 28rem;
            position: relative;
            z-index: 2;
            margin-right: 2rem;
        }
        .forgot-password {
            display: block;
            text-align: right;
            margin-top: 0.5rem;
            font-size: 0.875rem;
        }
        @media (max-width: 640px) {
            body {
                justify-content: center;
                padding: 0.5rem;
            }
            .login-container {
                margin-right: 0;
                max-width: 100%;
                border-radius: 0;
            }
        }
        @media (max-width: 768px) {
            .login-container {
                margin-right: 1rem;
            }
        }
        @media (min-width: 1024px) {
            .login-container {
                margin-right: 5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="header bg-gray-100 p-6 text-center border-b border-gray-200">
            <h1 class="text-2xl font-semibold text-gray-800">Welcome Back</h1>
        </div>
        <div class="form-container p-6">
            <?php if (isset($_GET['error'])): ?>
                <p class="text-red-500 text-sm mb-4"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>
            <?php if (isset($_GET['success'])): ?>
                <p class="text-green-500 text-sm mb-4"><?php echo htmlspecialchars($_GET['success']); ?></p>
            <?php endif; ?>
            <form action="process_login.php" method="POST">
                <div class="form-group mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-600 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-md text-sm focus:border-indigo-500 focus:outline-none" placeholder="Enter your email" required>
                </div>
                <div class="form-group mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-600 mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-md text-sm focus:border-indigo-500 focus:outline-none" placeholder="Enter your password" required>
                    <a href="forgot_password.php" class="forgot-password text-indigo-600 hover:underline">Forgot Password?</a>
                </div>
                <button type="submit" class="w-full p-3 bg-indigo-600 text-white rounded-md text-base font-medium hover:bg-indigo-700 transition duration-300">Sign In</button>
            </form>
            <div class="divider flex items-center my-6">
                <span class="flex-1 border-b border-gray-200"></span>
                <span class="px-4 text-xs text-gray-500">OR CONTINUE WITH</span>
                <span class="flex-1 border-b border-gray-200"></span>
            </div>
            <div class="social-login flex flex-col gap-3">
                <a href="google_login.php" class="flex items-center justify-center p-3 border border-gray-200 rounded-md text-sm font-medium text-red-500 hover:bg-gray-100 transition duration-300">
                    <i class="fab fa-google mr-2 text-lg"></i> Google
                </a>
            </div>
        </div>
        <div class="footer text-center p-4 border-t border-gray-200">
            <p class="text-sm">Don't have an account? <a href="register.php" class="text-indigo-600 hover:underline">Sign Up</a></p>
        </div>
    </div>
</body>
</html>