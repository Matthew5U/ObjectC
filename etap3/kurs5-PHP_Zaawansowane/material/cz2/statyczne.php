<?php

class Product
{
    //Statyczny skladnik
    static $name = 'Produkt 1';

    static $product_count = 20;


    // Statyczna metoda
    // Liczba wszyskich produktow
    static function showCount()
    {
        //Nie dostaniemy sie w ten sposob do zmiennej
        //$this-> 

        // Odwolanie sie do zmiennej
        // self to pelna nazwa klasy
        echo self::$product_count;
    }
}

//Blad
//echo $name;


//Nie trzeba tworzyc obiektu jesli mamy static
// Odwolanie sie do produktu
// Uzywamy znak dolara w zmiennej
echo Product::$name;

// Odwolanie do statycznej metody
Product::$product_count;










