<?php

class Product
{
    var $price;

    function showPrice()
    {
        return $this->price;
    }
}

$product1 = new Product();

$product2 = new Product();

$product1->price=50;
$product1->price=65;

echo $product1->showPrice().'<br>'; // Wyprowadzamy wartosc zmiennej
echo $product2->showPrice(); // Wyprowadzamy wartosc zmiennej

























