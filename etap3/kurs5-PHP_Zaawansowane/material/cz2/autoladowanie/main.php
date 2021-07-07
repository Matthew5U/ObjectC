<?php

//Definiowanie funkcji autoloader
function autoloader($class)
{
    include 'class.' . $class . '.php';
}

// Ladowanie automatyczne klas
spl_autoload_register('autoloader');

$p1 = new ListProducts();
$p1 = new AddProducts();
$p1 = new DeleteProducts();
