<?php

class Produkt
{
    function __construct($value)
    {
        $this->price = $value;
    }
}


$product1 = new Product(50);

//$product2 = new Product(68);
//$product2 = clone $product1;
$product2 = $product1;

// == <- Sprawdza czy wartosci sa takie same
// === <- Sprawdza czy wartosci i typ danych jest taki sam


//Porownanie obiektow
if($product1 === $product2)
{
    echo "Tak";
    // Uzycie referencji
}
else
{
    echo "Nie";
    // Jeden obiekt jest klonem
}







