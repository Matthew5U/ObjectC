<?php

$dbServer = '127.0.0.1';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'kurs_php7';

$mysqli = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
//print_r($mysqli);

if( mysqli_connect_errno())
{
    echo 'Blad z polaczeniem do bazy';
}















