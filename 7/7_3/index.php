<?php
$products = ['Git','Foundation','Bootstrap','WordPress','Laravel','Symfony'];


// Funckj tablicowe

print_r(count($products)); // Zlicza elementy w tablicy

print_r(array_reverse($products)); // Odwraca kolejsnoc elementow w tablicy


sort($products); // Sortowanie tablicy rosnaco
foreach($products as $product)
{
    echo $product . '<br>';
}
























?> 