<?php

//Rozpoczecie sesji
session_start();

//Zmienna zawierajaca 3 sekundy
$timeout = 3;

  
if(isset($_SESSION['timeout'])){ // CZy zmienna zostala ustawiona
    //Dlugosc trwania sesji 
    $sessionL = time() - $_SESSION['timeout'];  
    
    //Jesli przekroczyla to wylogowywuje uzytkownika
    if($sessionL > $timeout){
        session_destroy(); // Niszczymy sesje
        header("Location: logout.php"); // Przekierowywujemy do strony wologowania
    }
}

$_SESSION['timeout'] = time();// Zmienna pobierajaca czas

//Po wykonaniu akcji mozemy dowiedziec sie czy nas wylogowalo czy nie
echo "<a href=''>Link</a>";
