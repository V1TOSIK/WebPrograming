<?php
require_once __DIR__ . '/../repositories/HouseRepository.php';

class HouseService {
    private HouseRepository $repo;

    public function __construct(HouseRepository $repo) {
        $this->repo = $repo;
    }

    public function getLatestHouses(int $limit = 3): array {
        $houses = $this->repo->all($limit);

        // Додаємо бізнес-логіку: випадкова знижка
        foreach ($houses as $house) {
            $house->discountInfo = $this->getDiscountedPrice($house->price);
        }

        return $houses;
    }

    public function getDiscountedPrice(int $price): array {
        $discount = rand(0, 30);
        $discountedPrice = $price - ($price * $discount / 100);
        return ['discount' => $discount, 'price' => $discountedPrice];
    }
}
