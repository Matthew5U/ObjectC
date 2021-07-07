<?php
class Product
{
    var $price;
    var $name;
    var $category = 'Produkt';
}

// Dziedziczenie klasy
class Soft extends Product
{
    var $system;
    var $language;
    var $category = 'Soft';
}

//Dziedziczenie wlasciwosci
$soft1 = new Soft();
$soft1->price = 199;
echo $soft1->price;
echo $soft1->category; // Wyprowadzamy Soft

// Nie mozemy sie dostac do skladnikow klasy Soft



