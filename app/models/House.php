<?php
class House {
    public int $id;
    public string $title;
    public string $description;
    public int $price;
    public int $likes;

    public ?int $category_id;
    public ?string $category;

    public bool $is_slider;
    public bool $is_sold;
    public ?string $sold_at;

    public ?array $discountInfo = null;

    public function __construct(array $row) {
        $this->id = (int)$row['id'];
        $this->title = $row['title'];
        $this->description = $row['description'];
        $this->price = (int)$row['price'];
        $this->likes = (int)($row['likes'] ?? 0);

        $this->category_id = isset($row['category_id']) ? (int)$row['category_id'] : null;
        $this->category = $row['category'] ?? null;

        $this->is_slider = (bool)($row['is_slider'] ?? false);
        $this->is_sold = (bool)($row['is_sold'] ?? false);
        $this->sold_at = $row['sold_at'] ?? null;
    }
}
