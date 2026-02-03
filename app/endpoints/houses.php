<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../services/HouseService.php';
require_once __DIR__ . '/../repositories/HouseRepository.php';

// Створюємо репозиторій і сервіс
$repo = new HouseRepository($pdo);
$service = new HouseService($repo);

// Параметр limit
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 3;

// Отримуємо будинки через сервіс
$houses = $service->getLatestHouses($limit);

// Віддаємо JSON
header('Content-Type: application/json');
echo json_encode($houses);

?>