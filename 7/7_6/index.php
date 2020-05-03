<?php
$a = 23;
$b = '7';
$c = [20,40,40];

echo is_int($a); // Czy to jest int
echo is_int($b);
echo is_array($a); // Czy jest tablica
echo gettype($a); // Zwraca nam typ zmiennej
echo is_numeric($a); // Czy zmienna jest wartoscia numeyczna
                     // String przechowywujacy liczbe zworci nam true
echo isset($a); // Czy istnieje taka zmienna

unset($a); // Usuwanie zmiennej

var_dump($c); // Zwraca nam typ i zawartosc zmiennej


























?>