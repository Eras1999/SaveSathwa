<?php
require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT id, name, email, photo_url FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>

<div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">All Users</h2>
    <?php if (isset($error)): ?>
        <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
    <?php else: ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">ID</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Name</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Email</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($user['id']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($user['name']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($user['email']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b">
                                <?php if ($user['photo_url']): ?>
                                    <img src="<?php echo htmlspecialchars($user['photo_url']); ?>" alt="User Photo" class="w-10 h-10 rounded-full">
                                <?php else: ?>
                                    <span class="text-gray-500">No Photo</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>