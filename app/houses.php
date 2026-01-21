<?php
include 'house.php';
include 'functions.php';

function renderHouses($houses){
    foreach ($houses as $house) {
        $house->displayHouse();

        $discount = getDiscount($house->price);
        $newPrice = $house->price * (1 - $discount[0] / 100);

        if ($discount[0] > 0) {
            echo "<span class='line-through text-gray-400'>\$ {$house->price}</span> ";
        }
    
        echo "\$ $newPrice</p>";
    
        if ($discount[0] > 0) {
            echo "<p class='text-red-600 text-lg'>Discount: {$discount[0]}%</p>";
        }
    
        echo "</div></div></div>";
    }

}
?>