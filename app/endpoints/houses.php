<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../services/HouseService.php';
require_once __DIR__ . '/../repositories/HouseRepository.php';

$repo = new HouseRepository($pdo);
$service = new HouseService($repo);

$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 3;

$filters = [
    'title' => $_GET['title'] ?? null,
    'minPrice' => $_GET['minPrice'] ?? null,
    'maxPrice' => $_GET['maxPrice'] ?? null,
    'category' => $_GET['category'] ?? null
];

echo json_encode([
    'houses' => $service->getFilteredHouses($limit, $filters),
    'slider' => $service->getSliderHouses()

]);
