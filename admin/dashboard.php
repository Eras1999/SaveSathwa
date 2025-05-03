<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'users';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | SaveSathwa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            margin: 0;
        }
        .sidebar {
            background: #1e3a8a;
            color: white;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 1rem;
        }
        .sidebar .logo img {
            width: 120px;
            margin-bottom: 2rem;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 1rem;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.75rem;
            border-radius: 0.5rem;
        }
        .sidebar ul li a:hover, .sidebar ul li a.active {
            background: #3b82f6;
        }
        .sidebar ul li a i {
            margin-right: 0.75rem;
        }
        .main-content {
            margin-left: 250px;
            padding: 2rem;
            min-height: 100vh;
        }
        .header {
            background: white;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .content {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .hamburger {
                display: block;
                font-size: 1.5rem;
                cursor: pointer;
            }
        }
        @media (min-width: 769px) {
            .hamburger {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <img src="../img/logo5.png" alt="SaveSathwa Logo">
        </div>
        <ul>
            <li><a href="?tab=users" class="<?php echo $active_tab === 'users' ? 'active' : ''; ?>"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="?tab=contact_messages" class="<?php echo $active_tab === 'contact_messages' ? 'active' : ''; ?>"><i class="fas fa-envelope"></i> Contact Messages</a></li>
            <li><a href="?tab=blogs" class="<?php echo $active_tab === 'blogs' ? 'active' : ''; ?>"><i class="fas fa-pen"></i> Blogs</a></li>
            <li><a href="logout.php" class="text-red-200 hover:bg-red-600"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <div class="flex items-center">
                <div class="hamburger text-gray-600 mr-4" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </div>
                <h1 class="text-2xl font-semibold text-gray-800">Admin Dashboard</h1>
            </div>
            <div class="text-gray-600">Welcome, Admin</div>
        </div>
        <div class="content">
            <?php
            if ($active_tab === 'users') {
                include 'users.php';
            } elseif ($active_tab === 'contact_messages') {
                include 'contact_messages.php';
            } elseif ($active_tab === 'blogs') {
                include 'blogs.php';
            }
            ?>
        </div>
    </div>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>