<?php
    session_start();

    // Jesli flaga zalogowany nie bedzie ustawiona z tad negacja "!" to
    // przekieruje nas do index.php. Uzytkownik wpisujacy z reki sciezke do gra.php
    // nie zostany przkirwony do gra.php tylko do index.php
    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');

        // Po co dalej wykonywac wczytanie pliku jak nie jest zalgowany. Wiec uzyjemy exit();
        exit();
    }
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


<?php

    // korzystamy z zmiennych z globalnej tablicy czy $_SESSION['user]
    // Tworzymy tez link do wylogowania sie. PRzejscie do pliku logout powoduje zniszczenie sesji
    echo"<p>Witaj ".$_SESSION['user'].'! [<a href="logout.php">Wyloguj sie!</a>]</p>';

    // wyjmujemy dane otrzymane z sesji
    echo"<p><b>Drewno</b>: ".$_SESSION['drewno'];
    echo" | <b>Kamień</b>: ".$_SESSION['kamien'];
    echo" | <b>Zboże</b>: ".$_SESSION['zboze']."</p>";

    echo "<p><b>E-mail</b>: ".$_SESSION['email'];
    echo "<br><b>Data wygasniecia premium: </b>".$_SESSION['dnipremium']."</p>";


    //ustawiamy czas na serwerze nasztywno
    $dataczas = new DateTime('2017-01-01 09:30:15');


    //bierzemy metode obiektu dataczas    
    //echo "Data i czas serwera: ".$dataczas->format('Y-m-d H:i:s')."<br>".print_r($dataczas);

    // dwa obiekty musza byc obiektami klasy date time aby je odejmowac

    //przeniesiemy date wyjeta z bazy do nowego drugiego obiektu datetime
    //operator zasiegu :: z klasy date time wywolaj metode createFromeFile
    $koniec = DateTime::createFromFormat('Y-m-d H:i:s', $_SESSION['dnipremium']);


    //roznica pomiedzy czasami dataczas uzyj metody diff
    $roznica = $dataczas->diff($koniec);

    //sprawdzamy ktora data jes wczesniejsza
    // w %d wstawi liczbe dni kotra udalo sie obliczyc
    // wypisujemy ile zostalo dni do konca premium 
    if($dataczas<$koniec) echo "Pozostało premium: ".$roznica->format('%y lat, %m mies, %d dni, %h godz, %i min, %s sek');
    else echo "Premium nie aktywne od: ".$roznica->format('%y lat, %m mies, %d dni, %h godz, %i min, %s sek');
?>





</body>

</html>
