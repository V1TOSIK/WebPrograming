<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../repositories/ContactRepository.php';
require_once __DIR__ . '/../services/ContactService.php';
require_once __DIR__ . '/../models/ContactInformation.php';

header('Content-Type: application/json');

$repo = new ContactRepository($pdo);
$service = new ContactService($repo);

// Якщо POST – зберігаємо контакт
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $contact = new ContactInformation(
        $data['name'] ?? '',
        $data['email'] ?? '',
        $data['birthDate'] ?? '',
        $data['subject'] ?? '',
        $data['message'] ?? ''
    );

    $result = $service->saveContact($contact);
    echo json_encode($result);
    exit;
}

// GET – повертаємо всі контакти
$contacts = $service->getAllContacts();
echo json_encode($contacts);
