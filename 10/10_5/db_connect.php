<?php
$dbServer = '127.0.0.1';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'kurs_php7';

$mysqli = new mysqli($dbServer,$dbUser,$dbPassword,$dbName);
$mysqli-> set_charset('utf8'); // Ustawianie kodowania

if ( mysqli_connect_errno() ) {
	echo 'Błąd bazy danych';
}