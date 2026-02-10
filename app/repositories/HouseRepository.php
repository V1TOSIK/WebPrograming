<?php

require_once __DIR__ . '/../models/House.php';

class HouseRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Додати будинок у базу
    public function create(House $house): bool {
        $stmt = $this->pdo->prepare(
            "INSERT INTO houses (title, description, price) VALUES (:title, :description, :price)"
        );
        return $stmt->execute([
            ':title' => $house->title,
            ':description' => $house->description,
            ':price' => $house->price
        ]);
    }

    public function getAll(int $limit): array {
        $stmt = $this->pdo->prepare("
            SELECT h.*, c.name AS category
            FROM houses h
            LEFT JOIN categories c ON h.category_id = c.id
            ORDER BY h.id DESC
            LIMIT :limit
        ");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return array_map(fn($row) => new House($row), $stmt->fetchAll());
    }
}
