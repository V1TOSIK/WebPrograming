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

    // Отримати всі будинки (з обмеженням)
    public function all(int $limit = 3): array {
        $stmt = $this->pdo->prepare("SELECT * FROM houses ORDER BY id ASC LIMIT :limit");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        $houses = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $houses[] = new House(
                $row['title'],
                $row['description'],
                (int)$row['price']
            );
        }
        return $houses;
    }
}
