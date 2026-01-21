<?php
function getDiscount($price) {
    $discount = rand(0, 30);
    $discountedPrice = $price - ($price * ($discount / 100));
    return [$discount, $discountedPrice];
}
?>
