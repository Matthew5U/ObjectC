<?php

class Product
{
    private $name; // Nazwa produktu

    //Funkcje sa domyslnie public

    //Funkcja pobierajaca wartosc
    function getName()
    {
        return $this->name;
    }
    
    // Funkcja ustalajaca wartosc (name)
    function setName($value) // Wartosc tej nazwy
    {
        $this->name = $value;// Przypisujemy wartosc do name
    }
}

// UStawiamy wartosci 
$product = new Product();
$product->setName('Kurs php'); // Wprowadzamy jej name
echo $product->getName();



