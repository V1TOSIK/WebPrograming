<?php

require_once __DIR__ . '/../models/House.php';

class HouseRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll(
        int $limit,
        ?string $search = null,
        ?int $minPrice = null,
        ?int $maxPrice = null,
        ?int $categoryId = null
    ): array {

        $sql = "
            SELECT h.*, c.name AS category
            FROM houses h
            LEFT JOIN categories c ON h.category_id = c.id
            WHERE 1=1
        ";

        $params = [];

        if ($search) {
            $sql .= " AND h.title ILIKE :search";
            $params[':search'] = "%$search%";
        }

        if ($minPrice !== null) {
            $sql .= " AND h.price >= :minPrice";
            $params[':minPrice'] = $minPrice;
        }

        if ($maxPrice !== null) {
            $sql .= " AND h.price <= :maxPrice";
            $params[':maxPrice'] = $maxPrice;
        }

        if ($categoryId !== null) {
            $sql .= " AND h.category_id = :categoryId";
            $params[':categoryId'] = $categoryId;
        }

        $sql .= " ORDER BY h.id DESC LIMIT :limit";

        $stmt = $this->pdo->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

        $stmt->execute();

        return array_map(fn($row) => new House($row), $stmt->fetchAll());
    }

    public function getSliderHouses(): array {
        $stmt = $this->pdo->query("
            SELECT * FROM houses
            WHERE is_slider = true
            ORDER BY id DESC
        ");

        return array_map(fn($row) => new House($row), $stmt->fetchAll());
    }


    public function increaseLikes(int $id): bool {
        $stmt = $this->pdo->prepare("
            UPDATE houses
            SET likes = likes + 1
            WHERE id = :id
        ");
        return $stmt->execute([':id' => $id]);
    }

    public function getFeatured(): array {
        $stmt = $this->pdo->query("
            SELECT h.*, c.name AS category
            FROM houses h
            LEFT JOIN categories c ON h.category_id = c.id
            WHERE h.is_featured = true
            ORDER BY h.id DESC
        ");
        return array_map(fn($row) => new House($row), $stmt->fetchAll());
    }

    public function incrementLikes(int $id): bool {
        $stmt = $this->pdo->prepare("
            UPDATE houses 
            SET likes = likes + 1 
            WHERE id = :id
        ");
        return $stmt->execute([':id' => $id]);
    }


    public function getSoldBetween(string $from, string $to): array {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM houses
            WHERE sold = true
            AND sold_at BETWEEN :from AND :to
        ");
        $stmt->execute([
            ':from' => $from,
            ':to' => $to
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function markAsSold(int $id): bool {
        $stmt = $this->pdo->prepare("
            UPDATE houses
            SET is_sold = true,
                sold_at = NOW()
            WHERE id = :id
        ");
        return $stmt->execute([':id' => $id]);
    }


    public function getFiltered(int $limit, array $filters): array {

        $sql = "
            SELECT h.*, c.name AS category
            FROM houses h
            LEFT JOIN categories c ON h.category_id = c.id
            WHERE 1=1
        ";

        $params = [];

        if (!empty($filters['title'])) {
            $sql .= " AND h.title ILIKE :title";
            $params[':title'] = '%' . $filters['title'] . '%';
        }

        if (!empty($filters['minPrice'])) {
            $sql .= " AND h.price >= :minPrice";
            $params[':minPrice'] = $filters['minPrice'];
        }

        if (!empty($filters['maxPrice'])) {
            $sql .= " AND h.price <= :maxPrice";
            $params[':maxPrice'] = $filters['maxPrice'];
        }

        if (!empty($filters['category'])) {
            $sql .= " AND c.name = :category";
            $params[':category'] = $filters['category'];
        }

        $sql .= " ORDER BY h.id DESC LIMIT :limit";

        $stmt = $this->pdo->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

        $stmt->execute();

        return array_map(fn($row) => new House($row), $stmt->fetchAll());
    }

}
