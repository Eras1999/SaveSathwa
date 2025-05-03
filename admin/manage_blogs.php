<?php
// session_start(); // Removed to avoid duplicate session_start
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require_once 'config.php';

// Increase MySQL wait_timeout to prevent connection timeout
try {
    $pdo->exec("SET wait_timeout = 28800");
} catch (PDOException $e) {
    $error = "Failed to set database parameters: " . $e->getMessage();
}

// Function to reconnect to the database if connection is lost
function reconnectDB($pdo) {
    try {
        $pdo->query("SELECT 1");
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), 'MySQL server has gone away') !== false) {
            global $host, $dbname, $username, $password;
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_TIMEOUT, 30);
            $pdo->exec("SET wait_timeout = 28800");
        } else {
            throw $e;
        }
    }
    return $pdo;
}

$success = isset($_GET['success']) && $_GET['success'] == 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = reconnectDB($pdo); // Ensure connection is active

        if (isset($_POST['add_blog'])) {
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
            $keywords = filter_var($_POST['keywords'], FILTER_SANITIZE_STRING);

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image = file_get_contents($_FILES['image']['tmp_name']);
                if (strlen($image) > 4194304) { // 4MB limit
                    throw new Exception("Image size exceeds 4MB limit. Please upload a smaller image.");
                }
                if (!empty($title) && !empty($content) && !empty($keywords) && !empty($image)) {
                    $stmt = $pdo->prepare("INSERT INTO blogs (title, content, image, keywords) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$title, $content, $image, $keywords]);
                    header("Location: manage_blogs.php?success=1");
                    exit();
                }
            }
        } elseif (isset($_POST['edit_blog'])) {
            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
            $keywords = filter_var($_POST['keywords'], FILTER_SANITIZE_STRING);
            $image = null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image = file_get_contents($_FILES['image']['tmp_name']);
                if (strlen($image) > 4194304) { // 4MB limit
                    throw new Exception("Image size exceeds 4MB limit. Please upload a smaller image.");
                }
            }

            if ($image !== null) {
                $stmt = $pdo->prepare("UPDATE blogs SET title = ?, content = ?, image = ?, keywords = ?, updated_at = NOW() WHERE id = ?");
                $stmt->execute([$title, $content, $image, $keywords, $id]);
            } else {
                $stmt = $pdo->prepare("UPDATE blogs SET title = ?, content = ?, keywords = ?, updated_at = NOW() WHERE id = ?");
                $stmt->execute([$title, $content, $keywords, $id]);
            }
            header("Location: manage_blogs.php?success=1");
            exit();
        } elseif (isset($_POST['delete_blog'])) {
            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
            $stmt->execute([$id]);
            header("Location: manage_blogs.php?success=1");
            exit();
        }
    } catch (Exception $e) {
        $error = "Error: " . $e->getMessage();
    }
}

try {
    $pdo = reconnectDB($pdo); // Ensure connection is active
    $stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC");
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Blog Management | SaveSathwa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
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
        .card {
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
            border-radius: 8px;
        }
        .btn-primary {
            background: #3498db;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.3s ease;
            cursor: pointer;
        }
        .btn-primary:hover {
            background: #2980b9;
        }
        .btn-danger {
            background: #e74c3c;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.3s ease;
            cursor: pointer;
        }
        .btn-danger:hover {
            background: #c0392b;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-content {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            animation: slideDown 0.3s ease-out;
        }
        @keyframes slideDown {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .modal-header {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 0.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 6px;
            font-size: 1rem;
            color: #374151;
            transition: border-color 0.3s ease;
        }
        .form-input:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        .form-textarea {
            height: 120px;
            resize: vertical;
        }
        .form-file {
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 6px;
            font-size: 1rem;
            color: #6b7280;
            background: #fff;
        }
        .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 6px;
            font-size: 1rem;
            color: #374151;
            appearance: none;
            background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%236b7280' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") no-repeat right 0.75rem center;
            transition: border-color 0.3s ease;
        }
        .form-select:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        .btn-add {
            background: #3498db;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.3s ease;
            cursor: pointer;
        }
        .btn-add:hover {
            background: #2980b9;
        }
        .btn-cancel {
            background: #6b7280;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.3s ease;
            cursor: pointer;
        }
        .btn-cancel:hover {
            background: #4b5563;
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
            .card {
                padding: 1rem;
            }
            th, td {
                padding: 0.75rem;
                font-size: 0.75rem;
            }
            .modal-content {
                width: 95%;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo"><img src="../img/logo5.png" alt="SaveSathwa Logo"></div>
        <ul>
            <li><a href="users.php" class="hover:bg-blue-600"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="contact_messages.php" class="hover:bg-blue-600"><i class="fas fa-envelope"></i> Contact Messages</a></li>
            <li><a href="manage_blogs.php" class="active"><i class="fas fa-blog"></i> Blogs</a></li>
            <li><a href="logout.php" class="text-red-400 hover:bg-red-700"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <button onclick="document.getElementById('addBlogModal').style.display='flex'" class="btn-primary">Add New Blog</button>
        </div>
        <div class="card">
            <?php if (isset($error)): ?>
                <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
            <?php elseif ($success): ?>
                <p class="text-green-500 mb-4">Operation successful!</p>
            <?php endif; ?>
            <div class="table-container">
                <table>
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">ID</th>
                            <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Title</th>
                            <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Content</th>
                            <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Image</th>
                            <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Keywords</th>
                            <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($blogs as $blog): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['id']); ?></td>
                                <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['title']); ?></td>
                                <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars(substr($blog['content'], 0, 100)) . '...'; ?></td>
                                <td class="p-3 text-sm text-gray-800 border-b">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                                </td>
                                <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['keywords']); ?></td>
                                <td class="p-3 text-sm border-b">
                                    <button onclick="document.getElementById('editBlogModal<?php echo $blog['id']; ?>').style.display='flex'" class="btn-primary mr-2">Edit</button>
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="delete_blog" value="1">
                                        <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                                        <button type="submit" class="btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div id="editBlogModal<?php echo $blog['id']; ?>" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <div class="modal-header">Edit Blog</div>
                                    <form method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                                        <input type="hidden" name="edit_blog" value="1">
                                        <div class="form-group"><input type="text" name="title" class="form-input" value="<?php echo htmlspecialchars($blog['title']); ?>" placeholder="Title" required></div>
                                        <div class="form-group"><textarea name="content" class="form-input form-textarea" placeholder="Content" required><?php echo htmlspecialchars($blog['content']); ?></textarea></div>
                                        <div class="form-group"><input type="file" name="image" class="form-file"></div>
                                        <div class="form-group">
                                            <select name="keywords" class="form-select" required>
                                                <option value="dogs" <?php echo $blog['keywords'] === 'dogs' ? 'selected' : ''; ?>>Dogs</option>
                                                <option value="cats" <?php echo $blog['keywords'] === 'cats' ? 'selected' : ''; ?>>Cats</option>
                                                <option value="birds" <?php echo $blog['keywords'] === 'birds' ? 'selected' : ''; ?>>Birds</option>
                                                <option value="snakes" <?php echo $blog['keywords'] === 'snakes' ? 'selected' : ''; ?>>Snakes</option>
                                                <option value="others" <?php echo $blog['keywords'] === 'others' ? 'selected' : ''; ?>>Others</option>
                                            </select>
                                        </div>
                                        <div class="modal-actions">
                                            <button type="submit" class="btn-add">Save</button>
                                            <button type="button" onclick="document.getElementById('editBlogModal<?php echo $blog['id']; ?>').style.display='none'" class="btn-cancel">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Modal -->
        <div id="addBlogModal" class="modal" style="display: none;">
            <div class="modal-content">
                <div class="modal-header">Add New Blog</div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="add_blog" value="1">
                    <div class="form-group"><input type="text" name="title" class="form-input" placeholder="Title" required></div>
                    <div class="form-group"><textarea name="content" class="form-input form-textarea" placeholder="Content" required></textarea></div>
                    <div class="form-group"><input type="file" name="image" class="form-file" required></div>
                    <div class="form-group">
                        <select name="keywords" class="form-select" required>
                            <option value="dogs">Dogs</option>
                            <option value="cats">Cats</option>
                            <option value="birds">Birds</option>
                            <option value="snakes">Snakes</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="modal-actions">
                        <button type="submit" class="btn-add">Add</button>
                        <button type="button" onclick="document.getElementById('addBlogModal').style.display='none'" class="btn-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
</body>
</html>