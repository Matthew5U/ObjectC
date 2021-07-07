<?php

class Product
{
    var $name;
}

$product1 = new Product();
$product1->name='Kurs php';
//echo $product1->name.'<br>';

//Klonowanie 
// Takie same wartosci
//$product2=clone $product1;

//Nadpisanie wartosci
//$product1->name='Kurs php 2';
//echo $product2->name;

//Uzycie referencji
//Odwolanie do tych smaych wartosci w pamieci
$product2 = $product1;
$product2->name = "Kurs Mysql";

//Zmienimy wartosci nawet dla pierwszej instancji
//Obydwia obiekt sa zmodyfikowane
echo $product1->name;


