<?php
require_once __DIR__ . '/../config/db.php';

// Очікуємо POST із JSON {id: houseId}
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'House ID missing']);
    exit;
}

$houseId = (int)$data['id'];

// Оновлюємо кількість лайків
$stmt = $pdo->prepare("UPDATE houses SET likes = likes + 1 WHERE id = :id");
$success = $stmt->execute([':id' => $houseId]);

echo json_encode(['success' => $success]);
