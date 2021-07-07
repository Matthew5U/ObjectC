<?php

class Product
{
    // Zmienna cena produktu
    var $price;

    // Konstruktor jest funkcja
    function __construct($product_price = 60) // Parametr
    {
        $this->price = $product_price;
    }
}

$product1 = new Product(65); // Nadanie parametru do konstruktora
$product2 = new Product(47); // Nadanie parametru do konstruktora

echo $product1->price.'<br>';
echo $product2->price;














