<?php
require_once 'config.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$action = $_GET['action'] ?? 'list';
$blog_id = $_GET['id'] ?? null;

if ($action === 'delete' && $blog_id) {
    try {
        $stmt = $pdo->prepare("SELECT image_path FROM blogs WHERE id = ?");
        $stmt->execute([$blog_id]);
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($blog && $blog['image_path']) {
            unlink($blog['image_path']);
        }
        $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
        $stmt->execute([$blog_id]);
        header("Location: blogs.php");
        exit();
    } catch (PDOException $e) {
        $error = "Error deleting blog: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $topic = filter_var($_POST['topic'], FILTER_SANITIZE_STRING);
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    $keywords = implode(',', array_filter($_POST['keywords'] ?? [], 'strlen'));

    $image_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../uploads/blogs/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $image_path = $upload_dir . uniqid() . '-' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }

    try {
        if ($action === 'edit' && $blog_id) {
            $stmt = $pdo->prepare("UPDATE blogs SET topic = ?, content = ?, image_path = COALESCE(?, image_path), keywords = ? WHERE id = ?");
            $stmt->execute([$topic, $content, $image_path, $keywords, $blog_id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO blogs (topic, content, image_path, keywords) VALUES (?, ?, ?, ?)");
            $stmt->execute([$topic, $content, $image_path, $keywords]);
        }
        header("Location: blogs.php");
        exit();
    } catch (PDOException $e) {
        $error = "Error saving blog: " . $e->getMessage();
    }
}

if ($action === 'edit' && $blog_id) {
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->execute([$blog_id]);
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);
}

$blogs = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Manage Blogs</h2>
    <?php if ($action === 'create' || $action === 'edit'): ?>
        <form method="POST" enctype="multipart/form-data" class="mb-6 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-medium text-gray-700 mb-4"><?php echo $action === 'edit' ? 'Edit Blog' : 'Create New Blog'; ?></h3>
            <?php if (isset($error)): ?>
                <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <div class="mb-4">
                <label for="topic" class="block text-sm font-medium text-gray-700 mb-2">Topic <span class="text-red-500">*</span></label>
                <input type="text" id="topic" name="topic" value="<?php echo $action === 'edit' ? htmlspecialchars($blog['topic']) : ''; ?>" class="w-full p-3 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content <span class="text-red-500">*</span></label>
                <textarea id="content" name="content" rows="5" class="w-full p-3 border rounded-lg" required><?php echo $action === 'edit' ? htmlspecialchars($blog['content']) : ''; ?></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Blog Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full p-3 border rounded-lg">
                <?php if ($action === 'edit' && $blog['image_path']): ?>
                    <img src="<?php echo htmlspecialchars($blog['image_path']); ?>" alt="Blog Image" class="w-32 h-32 object-cover mt-2 rounded-lg">
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Keywords <span class="text-red-500">*</span></label>
                <?php $selected_keywords = $action === 'edit' ? explode(',', $blog['keywords']) : []; ?>
                <label class="inline-flex items-center mr-4">
                    <input type="checkbox" name="keywords[]" value="dogs" <?php echo in_array('dogs', $selected_keywords) ? 'checked' : ''; ?> class="mr-2">
                    Dogs
                </label>
                <label class="inline-flex items-center mr-4">
                    <input type="checkbox" name="keywords[]" value="cats" <?php echo in_array('cats', $selected_keywords) ? 'checked' : ''; ?> class="mr-2">
                    Cats
                </label>
                <label class="inline-flex items-center mr-4">
                    <input type="checkbox" name="keywords[]" value="birds" <?php echo in_array('birds', $selected_keywords) ? 'checked' : ''; ?> class="mr-2">
                    Birds
                </label>
                <label class="inline-flex items-center mr-4">
                    <input type="checkbox" name="keywords[]" value="snakes" <?php echo in_array('snakes', $selected_keywords) ? 'checked' : ''; ?> class="mr-2">
                    Snakes
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="keywords[]" value="others" <?php echo in_array('others', $selected_keywords) ? 'checked' : ''; ?> class="mr-2">
                    Others
                </label>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save Blog</button>
            <a href="blogs.php" class="ml-2 text-gray-600 hover:underline">Cancel</a>
        </form>
    <?php else: ?>
        <a href="?action=create" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Create New Blog</a>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">ID</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Topic</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Image</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Keywords</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Created At</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($blogs as $blog): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['id']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['topic']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b">
                                <?php if ($blog['image_path']): ?>
                                    <img src="<?php echo htmlspecialchars($blog['image_path']); ?>" alt="Blog Image" class="w-16 h-16 object-cover rounded-lg">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['keywords']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($blog['created_at']); ?></td>
                            <td class="p-3 text-sm border-b">
                                <a href="?action=edit&id=<?php echo $blog['id']; ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                                <a href="?action=delete&id=<?php echo $blog['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>