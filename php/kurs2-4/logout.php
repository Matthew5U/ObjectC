<?php

    session_start();

    //Niszczenie sesji. Niszczenie wszystkich danych sesyjnych
    session_unset();

    header('Location: index.php');



?>

