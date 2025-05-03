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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8fafc;
            margin: 0;
            overflow-x: hidden;
        }
        .sidebar {
            background: linear-gradient(180deg, #2c3e50, #34495e);
            color: #fff;
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 1.5rem;
            transition: transform 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar .logo img {
            width: 140px;
            margin-bottom: 2rem;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 1.5rem;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .sidebar ul li a:hover, .sidebar ul li a.active {
            background: rgba(255, 255, 255, 0.15);
            color: #ecf0f1;
        }
        .sidebar ul li a i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }
        .main-content {
            margin-left: 260px;
            padding: 2rem 2.5rem;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        .header {
            background: #fff;
            padding: 1.5rem 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-left: 4px solid #3498db;
        }
        .header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #2c3e50;
        }
        .content {
            background: #fff;
            padding: 1.5rem 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        th {
            background: #f9fafb;
            font-weight: 600;
            color: #374151;
            text-transform: uppercase;
            font-size: 0.875rem;
        }
        tr:hover {
            background: #f9fafb;
        }
        img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }
        select {
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 0.875rem;
            color: #374151;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 200px;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            .header {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }
            .content {
                padding: 1rem;
            }
            th, td {
                padding: 0.75rem;
                font-size: 0.75rem;
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
            <li><a href="?tab=manage_blogs" class="<?php echo $active_tab === 'manage_blogs' ? 'active' : ''; ?>"><i class="fas fa-blog"></i> Blogs</a></li>
            <li><a href="logout.php" class="text-red-400 hover:bg-red-700"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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
            } elseif ($active_tab === 'manage_blogs') {
                include 'manage_blogs.php';
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