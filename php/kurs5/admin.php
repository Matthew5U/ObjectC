<?php
session_start();

//czy wchodzimy na admin.php jesli juz jestesmy zalgowanie
// wiec powinnismy byc przeniesieni do list.php
if(isset($_SESSION['logged_id']))
{
    header ('Location: list.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Panel administracyjny</title>
    <meta name="description" content="Używanie PDO - odczyt z bazy MySQL">
    <meta name="keywords" content="php, kurs, PDO, połączenie, MySQL">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">

        <header>
            <h1>Admin</h1>
        </header>

        <main>
            <article>
                <form method="post" action="list.php">
                    <label>Login <input type="text" name="login"></label>
                    <label>Hasło <input type="password" name="pass"></label>
                    <input type="submit" value="Zaloguj się!">
                    <?php

                        // jesli podalismy zle dane to powstanie blad bad_attempt
                        // i wyswietli ona blad
                        if(isset($_SESSION['bad_attempt']))
                        {
                            echo '<p>Nie poprawny login lub haslo</p>';
                            //usuwamy zmienna gdyz odwswiezenie witryny powinno usunac ta zmienna

                            unset($_SESSION['bad_attempt']);
                        }
                    ?>
                </form>
            </article>
        </main>

    </div>
</body>
</html>
