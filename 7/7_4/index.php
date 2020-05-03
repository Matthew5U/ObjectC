<?php

// Praca na katalogach

//mkdir("/home/mateusz/devilbox/data/www/Nauka/htdocs/7/7_4/files"); // Utworz katalog
if (! file_exists('files'))
{
    mkdir("/home/mateusz/devilbox/data/www/Nauka/htdocs/7/7_4/files"); // Utworz katalog
    echo 'Tworzymy plik';
}
else
{
    echo 'Katalog istnieje';
}

$file = fopen('tekst.txt' , 'w'); // Otwieranie pliku. Nazwa pliku | Otwarcie do zapisu (write)
$text = 'To jest zawartosc pliku';
fwrite($file, $text); // Zapisujemy zawartosc
fclose($file); // Zamkniecie pliku



?>