<?php
$orderValue = 10;

/*
if ( $orderValue >= 300)
{
    $discount = 10;
}
else
{
    $discount = 5;
}
*/

// To taki if jak wyzej tylko krotsza forma
$discount = ($orderValue >= 300) ? 10 : 5;

echo "Wartosc rabatu to $discount";


