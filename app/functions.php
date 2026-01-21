<?php
function getDiscount($price) {
    $discount = rand(0, 30);
    $discountedPrice = $price - ($price * ($discount / 100));
    return [$discount, $discountedPrice];
}

function generateHouses($count) {
    $houses = [];

    for ($i = 1; $i <= $count; $i++) {
        $houses[] = new House(
            rand(80000, 300000),
            "House $i",
            "Address $i",
            "123-456-789",
            "https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg",
            rand(1, 5),
            rand(1, 3)
        );
    }

    return $houses;
}

?>
