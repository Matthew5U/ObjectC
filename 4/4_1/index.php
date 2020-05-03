<?php
/*
* 404 - Brak strony o podanym adresie
* 502 - Bład serwera
* Pozostałe - Nieokreślony bład
*/
$errorCode = 404;


// Instrukcje warunkowe
if ( $errorCode == 404)
{
    echo 'Blad strony';
}
else if( $errorCode == 502)
{
    echo 'Blad serwera';
}
else
{
    echo 'Nieokreslony blad';
}



?>