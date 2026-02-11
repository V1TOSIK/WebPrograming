<?php
require_once __DIR__ . '/../config/db.php';

$start = $_GET['start'] ?? '';
$end = $_GET['end'] ?? '';

if (!$start || !$end) {
    die("Start and end dates required");
}

// Беремо продані будинки за період
$stmt = $pdo->prepare("
    SELECT id, title, price, sold_at 
    FROM houses 
    WHERE sold = true AND sold_at BETWEEN :start AND :end
    ORDER BY sold_at
");
$stmt->execute([':start' => $start, ':end' => $end]);
$houses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Виводимо CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="report.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Title', 'Price', 'Sold At']);

foreach ($houses as $house) {
    fputcsv($output, [$house['id'], $house['title'], $house['price'], $house['sold_at']]);
}

fclose($output);
exit;
