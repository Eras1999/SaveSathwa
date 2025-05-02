<?php
require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT id, name, email, message, created_at FROM contact_messages");
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
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Message</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-600 border-b">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['id']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['name']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['email']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['message']); ?></td>
                            <td class="p-3 text-sm text-gray-800 border-b"><?php echo htmlspecialchars($message['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>