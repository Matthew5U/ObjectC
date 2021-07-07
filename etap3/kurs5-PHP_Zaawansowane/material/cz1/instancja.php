<?php

class Product
{
    function showClassName()
    {
        echo 'Nazwa klasy to: Product';
    }

}

// obiekt tego typu - instancja
$product1 = new Product();
$product2 = new Product();// drugi obiekt
$product3 = new Product();// trzeci obiekt


//echo get_Class($product1); // Sprawdz klase obiektu
$product1->showClassName(); // Wywolujmy matode na obiekcie



?>







