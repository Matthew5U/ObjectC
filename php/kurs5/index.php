<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Newsletter - zapisz się!</title>
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
                <form method="post" action="save.php">
                    <label>Podaj adres e-mail
                        <input type="email" name="email" 
                        <?= //przypisuejmy zle wpisany email znwou do formualrza aby uzytkownik nie musial od nowa go wpisywac tylko porawic
                        // skranie wartosci inline
                        // mozna uzyc <? zamiast <? ale to musi byc wlaczone w pliku php.ini
                        // <?= jest to samo co <php echo
                        
                        // mozemy zapisac to tez tak:
                        // warunek ? instrukcja1(jesli if sie uda) : instrukcja2(jesli if sie nie uda)

                        /* Stary zapis 
                        <?php
                        if ( isset($_SESSION['given_email']))
                        echo 'value="' . $_SESSION['given_email'] . '"'
                        ?> 
                        */
                        isset($_SESSION['given_email']) ? 'value="'. $_SESSION['given_email'] . '"' : ''?>


                        >
                    </label>
                    <input type="submit" value="Zapisz się!">

                    <?php

                    if ( isset($_SESSION['given_email']))
                    {
                        echo '<p>To nie jest poprawny adres<p>';
                        // usuawmy ta zmienna zeby nie pojawila sie tutaj kiedys niepotrzebnie
                        unset($_SESSION['given_email']);
                    }

                    ?>

                </form>
            </article>
        </main>

    </div>
</body>
</html>
