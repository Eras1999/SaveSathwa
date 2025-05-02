<?php
require_once 'config.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status']) && isset($_POST['id'])) {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
        $stmt = $pdo->prepare("UPDATE contact_messages SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
    }

    $stmt = $pdo->query("SELECT id, name, email, phone, message, created_at, COALESCE(status, 'pending') AS status FROM contact_messages");
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>

<div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Contact Messages</h2>
    <?php if (isset($error)): ?>
        <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">ID</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Name</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Email</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Phone</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Message</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Date</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Status</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['id']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['name']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['email']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['phone']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['message']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['created_at']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['status']); ?></td>
                            <td class="p-3 text-sm border-b">
                                <form method="POST" class="inline">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($message['id']); ?>">
                                    <select name="status" onchange="this.form.submit()" class="border rounded-lg p-1 text-sm">
                                        <option value="pending" <?php echo $message['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="checked" <?php echo $message['status'] === 'checked' ? 'selected' : ''; ?>>Checked</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>