<?php
$x=10;

/*
function divideNumber ( $number)
{
    return $number /= 2;
}

// Pracujemy na kopii
echo divideNumber( $x ) . '<br>'; 

echo $x;
*/


function divideNumber2 ( & $number) // Przekazujemy przez referencje
{
    return $number /= 2;
}

// Pracujemy na glownej zmiennej
echo divideNumber2( $x ) . '<br>'; 




































?>