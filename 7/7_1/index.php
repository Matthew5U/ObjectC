<?php
$price = 69;
$description = 'Praktyczna umiejętność korzystania z Git';
$currency = ' zł';

#echo $price . trim($currency); // trim - usuwa spacje na poczatku i na koncu

//echo substr($description, 0,10); // Wycinane. Nasza zmienna | Od ktorego do ktorego znaku

print_r(explode(" ", $description)); // Dzielimy na oddzielne slowa a naszym dzielnikiem jest spacja. Zwraca nam tablice




















?>