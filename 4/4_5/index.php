<?php
// Przeslanie danych z formularza
$_GET['username'] = 'Ksawery';

/*
// Dane z formularza
// isset - sprawdza czy jest zmienna przeslana
if ( isset($_GET['username']))
{
    $username = $_GET['username'];
}
else
{
    $username = 'wartosc domyslna'; 
}
*/

//$username = isset($_GET['username']) ? $_GET['username'] : 'Wartosc domyslna';

// Od php 7. Jesli jest taka wartosc to ja ustaw a jesli nie to ustaw domyslna wartosc
$username = $_GET['username'] ?? 'Wartosc Domyslna';

echo $username;



