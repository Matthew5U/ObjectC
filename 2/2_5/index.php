<?php

// Komentarz jedno liniowy
# Komentarz jedno liniowy w PHP
/*
Komentarz wieloliniowy
*/

// Laczenie znakow kropka

$price = 199; // Cena
$symbol = 'zł';

echo 'Cena: '.$price. ' '.$symbol;
echo '<br>';
echo "Cena: $price $symbol "; // Jeden string. Slaby cudzyslow i nie czyta tego jako tekst do konca
echo 'Cena: $price $symbol '; // Jeden string. Mocne ampesanty ktore czytaja linijke jako string, nie podmieniaja na zmienne

?>
