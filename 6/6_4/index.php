<?php
// Funkcje anonimowe - uzywa sie ich gdy potrzbeujemy wywolac funckje w jednym miejscu i nigdzie wiecej
$numbers = [1,2,3,4,5];
print_r($numbers);
echo '<br/>';

$newNumbers = array_map(function ($X)
{
    return $X * 2;
},
$numbers); //call back - Na kazdym elemencie wywolujemy funckje | Nasza tablica 
 
print_r($newNumbers);

























?>