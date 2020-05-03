<?php

$x = false;
$x = 0; // To samo co false
$x = ""; // Pusty ciag to tez false
$x = [];// Pusta tablica to tez false

if( $x == false)
{
echo 'Zmienna x ma wartosc Fałsz';
}
else
{
    echo 'Zmienna x ma wartosc true';
}