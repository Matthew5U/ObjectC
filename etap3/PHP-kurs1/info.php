<?php

session_start();

var_dump($_SESSION['test']);

var_dump($_REQUEST); // Przechowuje infromacje albo $_GET albo $_POST

echo "<pre>"; // Mozemy ustawic szerokosc wyswietlanych danych
var_dump($_SERVER); // Dostajemy informaje o nasyzm serwerze np nazwa hosta itp

phpinfo(); // Otrzymamy informacje o nasyzm serwerze
