<?php

    session_start();

    // Jesli nieistnieje w sesji zmiennna udana rejstracja to wyrzuc uzytkownika do ekranu logowania
    if(!isset($_SESSION['udanarejestracja']))
    {
        // jesli nie istnieje taka zmienna to przenies do storny glownej
        header('Location: index.php');

        // Linijka exit(); jest po to aby serwer nie generowal dalej strony po co 
        // tylko przeszedl do pliku gra.php
        exit();
    }
    else
    {   
        // udalo sie utworzyc uzytkownika wiec usuwamy z sesji ta zmienna
        unset($_SESSION['udanarejestracja']);
    }

    // Usuwamy zmienne pamietajace wartosci wpisane do formularza 
    if (isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
    if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
    if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
    if (isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
    if (isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);

    //usuwanie bledow rejestracji
    if (isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
    if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if (isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
    if (isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
    if (isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Osadnicy</title>
    <meta name="description" content="">
    <meta name="keywords" content="" >
    <meta htp-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    

    
</head>



<body>
    
    Dziękujemy za rejestracje w serwisie. Mozesz juz zalogowac sie na swoje konto

    <br><br>

    <a href="index.php">Zaloguj sie na swoje konto</a>
    
    <br><br>




</body>

</html>
