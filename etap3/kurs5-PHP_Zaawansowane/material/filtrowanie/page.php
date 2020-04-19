<?php

//Jakis text
$str = "<p style='color: red'>to jest akapit</p>";

//Zmienna do filtrowania 
//filter_var - filtruj zmienna
//FILTER_SANITIZE_STRING - Funkcja filtrujaca ciag znakow
$str_filterted = filter_var($str, FILTER_SANITIZE_STRING);

//Pokaz przefiltrowany string
echo $str_filterted . "<br>";


// PRzykladowy email
$email = "bok@strefakursow.pl";

//Funkcja fltrujaca email
$email_f = filter_var($email, FILTER_SANITIZE_EMAIL);

//Pokaz przefiltrowany email
echo $email_f;
