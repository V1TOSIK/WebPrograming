<?php
class House {
    public int $id;
    public string $title;
    public string $description;
    public int $price;
    public int $likes;
    public ?string $category;

    public ?array $discountInfo = null;

    public function __construct(array $row) {
        $this->id = (int)$row['id'];
        $this->title = $row['title'];
        $this->description = $row['description'];
        $this->price = (int)$row['price'];
        $this->likes = (int)$row['likes'];
        $this->category = $row['category'] ?? null;
    }
}
