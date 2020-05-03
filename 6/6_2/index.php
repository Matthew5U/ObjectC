<?php
$basicPrice = 200;
$discountRate = 0.1;

function calculateDiscount($price, $discount)
{


    $discountedPrice = $price - ( $price * $discount);
    return $discountedPrice;
}

echo calculateDiscount($basicPrice, $discountRate);

?>