<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_blog'])) {
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
        $keyword = filter_var($_POST['keyword'], FILTER_SANITIZE_STRING);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $target_dir = "../img/blogs/";
        $target_file = $target_dir . basename($image);

        if (!empty($title) && !empty($content) && !empty($keyword) && !empty($image)) {
            if (move_uploaded_file($image_tmp, $target_file)) {
                try {
                    $stmt = $pdo->prepare("INSERT INTO blogs (title, content, image, keyword, created_at, status) VALUES (?, ?, ?, ?, NOW(), 1)");
                    $stmt->execute([$title, $content, $image, $keyword]);
                    header("Location: ?tab=blogs");
                    exit();
                } catch (PDOException $e) {
                    $error = "Error: " . $e->getMessage();
                }
            }
        } else {
            $error = "All fields are required!";
        }
    } elseif (isset($_POST['edit_blog'])) {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
        $keyword = filter_var($_POST['keyword'], FILTER_SANITIZE_STRING);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $target_dir = "../img/blogs/";
        $target_file = $target_dir . basename($image);

        try {
            if (!empty($image) && move_uploaded_file($image_tmp, $target_file)) {
                $stmt = $pdo->prepare("UPDATE blogs SET title = ?, content = ?, image = ?, keyword = ? WHERE id = ? AND status = 1");
                $stmt->execute([$title, $content, $image, $keyword, $id]);
            } else {
                $stmt = $pdo->prepare("UPDATE blogs SET title = ?, content = ?, keyword = ? WHERE id = ? AND status = 1");
                $stmt->execute([$title, $content, $keyword, $id]);
            }
            header("Location: ?tab=blogs");
            exit();
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    } elseif (isset($_POST['delete_blog'])) {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        try {
            $stmt = $pdo->prepare("UPDATE blogs SET status = 0 WHERE id = ?");
            $stmt->execute([$id]);
            header("Location: ?tab=blogs");
            exit();
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}

try {
    $stmt = $pdo->query("SELECT * FROM blogs WHERE status = 1 ORDER BY created_at DESC");
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>

<div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Manage Blogs</h2>
    <?php if (isset($error)): ?>
        <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <!-- Add Blog Form -->
    <div class="mb-6 bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-4">Add New Blog</h3>
        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" class="w-full p-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" class="w-full p-2 border rounded-lg" rows="4" required></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" class="w-full p-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Keyword</label>
                <select name="keyword" class="w-full p-2 border rounded-lg" required>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="bird">Bird</option>
                    <option value="snake">Snake</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <button type="submit" name="add_blog" class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700">Add Blog</button>
        </form>
    </div>

    <!-- Blogs Table -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">ID</th>
                    <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Title</th>
                    <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Content</th>
                    <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Image</th>
                    <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Keyword</th>
                    <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Date</th>
                    <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogs as $blog): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['id']); ?></td>
                        <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['title']); ?></td>
                        <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars(substr($blog['content'], 0, 50)) . (strlen($blog['content']) > 50 ? '...' : ''); ?></td>
                        <td class="p-3 text-sm text-gray-800 border-b"><img src="../img/blogs/<?php echo htmlspecialchars($blog['image']); ?>" alt="Blog Image" class="w-16 h-16 object-cover"></td>
                        <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['keyword']); ?></td>
                        <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['created_at']); ?></td>
                        <td class="p-3 text-sm border-b">
                            <form method="GET" action="?tab=blogs" class="inline">
                                <input type="hidden" name="tab" value="blogs">
                                <input type="hidden" name="edit" value="<?php echo $blog['id']; ?>">
                                <button type="submit" class="text-blue-600 hover:text-blue-800 mr-2">Edit</button>
                            </form>
                            <form method="POST" class="inline">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($blog['id']); ?>">
                                <button type="submit" name="delete_blog" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php if (isset($_GET['edit']) && $_GET['edit'] == $blog['id']): ?>
                        <tr class="bg-gray-50">
                            <td colspan="7" class="p-4">
                                <form method="POST" enctype="multipart/form-data" class="space-y-4">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($blog['id']); ?>">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" value="<?php echo htmlspecialchars($blog['title']); ?>" class="w-full p-2 border rounded-lg" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Content</label>
                                        <textarea name="content" class="w-full p-2 border rounded-lg" rows="4" required><?php echo htmlspecialchars($blog['content']); ?></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Image</label>
                                        <input type="file" name="image" class="w-full p-2 border rounded-lg">
                                        <p class="text-sm text-gray-500">Current: <img src="../img/blogs/<?php echo htmlspecialchars($blog['image']); ?>" alt="Current Image" class="w-16 h-16 object-cover mt-2"></p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Keyword</label>
                                        <select name="keyword" class="w-full p-2 border rounded-lg" required>
                                            <option value="dog" <?php echo $blog['keyword'] === 'dog' ? 'selected' : ''; ?>>Dog</option>
                                            <option value="cat" <?php echo $blog['keyword'] === 'cat' ? 'selected' : ''; ?>>Cat</option>
                                            <option value="bird" <?php echo $blog['keyword'] === 'bird' ? 'selected' : ''; ?>>Bird</option>
                                            <option value="snake" <?php echo $blog['keyword'] === 'snake' ? 'selected' : ''; ?>>Snake</option>
                                            <option value="others" <?php echo $blog['keyword'] === 'others' ? 'selected' : ''; ?>>Others</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="edit_blog" class="bg-green-600 text-white p-2 rounded-lg hover:bg-green-700">Save Changes</button>
                                    <a href="?tab=blogs" class="text-gray-600 hover:text-gray-800 ml-4">Cancel</a>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>