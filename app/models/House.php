<?php
class House {
    public string $title;
    public string $description;
    public int $price;
    public array $discountInfo = [];

    public function __construct(string $title, string $description, int $price) {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }
}

?>