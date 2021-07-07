<?php

    session_start();

    // Jesli istnieje w sesji zalogowany(a istnieje jesli sie juz zlogujemy wczesniej w pliku zaloguj)
    // i jesli zalogowany ma flage true to wykonaj czynnosci
    if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany'] == true))
    {
        // przejdz do gra
        header('Location: gra.php');

        // Linijka exit(); jest po to aby serwer nie generowal dalej strony po co 
        // tylko przeszedl do pliku gra.php
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
    Tylko martwi ujrzeli koniec wijny - Platon

    <br><br>

    <a href="rejestracja.php">Rejestracja - załóż darmowe konto</a>
    
    <br><br>

    <form action="zaloguj.php" method="post">
        Login: <input type="text" name="login"> <br>

        <br>

        Hasło: <input type="password" name="haslo"> <br><br>

        <input type="submit" value="Zaloguj się">



    </form>
<?php

    // isset - jesli zmienna $_SESSION istnieje to ja wtedy pokaz innaczej nie pokazuj
   if(isset($_SESSION['blad'])) echo $_SESSION['blad'];

?>



</body>

</html>
