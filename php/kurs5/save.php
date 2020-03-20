<?php

session_start();



    // jesli podano email do zapisania sie 
    if (isset($_POST['email']))
    {
        // zwalidujmy adrs email
        //filter_input(zrodlo danych wjesciowych, indeks zmiennej, rodzaj filtru)
        // filter_input - jesli wszystko bedzei sie zgadzac czyli filter_validate_email pusci dalej bo jest popawny email to do zmiennej $emial trafi email a jesli nas zawiedzie to trafi false / NULL
        // idnetyfikator testu filtrujaceg, czyli zgodnosc z jakim wyrazeniem bedziemy chcieli spawdzic 

        // jesli filetr validete email da takiego smaego maila co podal uzytwkonik w smiennej email to do zmiennej email dizkie filter input trafi email a jesli nie do zmiennej emial przypisana zostanie wartosc 0 lub null
        $email= filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        // sprawdzaym czy jest pusty albo 0 albo false
        if (empty($email))
        {
            // Tworzymy zmienna sesyjna i przypisujemy jej email podany przez uzytkownika
            $_SESSION['given_email'] = $_POST['email'];
            header("Location: index.php");
        }
        else
        {   
            // Tutaj jest sens skorzystania z bazy danych. Bo wczesniej sa zle dane wiec nie ma po co sie laczyc do bazy
            require_once 'database.php';
            //tworzymy obiektwe zapytanie
            //prepare - przygotowywujemy zapytanie
            // null bo jest autoinkrement
            $query = $db->prepare('INSERT INTO users VALUES (NULL, :email)');

            //bindValue - przypisz, dokonaj powiazania wartosci zmiennej do tego naszego identyfikatora z dwukrpkiem :
            //gdzie nasza wartosc ma trfic, i gdzie siedzi zmienna, i typ podanej wartoci(param -aprametr, str - string)
            $query->bindValue(':email', $email, PDO::PARAM_STR);

            //skoro mamy wszystko to wykonujemy zapytanie
            $query->execute();

            //WYKONALISMY INSERTA W PDO

        }






    }
    // jesli nie podano to przekieruj znowu na ta samam stone index.php
    else
    {
        header('Location: index.php');
        exit();
    }


?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <title>Zapisanie się do newslettera</title>
    <meta name="description" content="Używanie PDO - zapis do bazy MySQL">
    <meta name="keywords" content="php, kurs, PDO, połączenie, MySQL">

    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">

        <header>
            <h1>Newsletter</h1>
        </header>

        <main>
            <article>
                <p>Dziękujemy za zapisanie się na listę mailową naszego newslettera!</p>
            </article>
        </main>

    </div>

</body>
</html>
