
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Podsumowanie zamowienia</title>
    <meta name="description" content="">
    <meta name="keywords" content="" >
    <meta htp-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    
    
</head>



<body>

<?php
    //Do zmiennej paczkow wloz wartos przeslana metoda post z elementow formularza o nazwie 'paczkow'
    //Jesli by byla metoda get to napisali bysmy $_GET
    $paczkowPHP = $_POST['paczkow'];// tutaj trafia wszystkie dane z przeslanego formularza

    $grzebieniPHP = $_POST['grzebieni'];
    
    $suma = 0.99*$paczkowPHP + 1.29*$grzebieniPHP;

    // cellpadding - padding w komrokach | cellspacing - odstep pomiedzy komorkami
echo<<<END

    <h2>Podsumowanie zamowienia</h2>
    
    <table border="1" cellpadding="10" cellspacing="0">      

        <tr> 
            <td>Pączek(0.99PLN/szt)</td>
            <td>$paczkowPHP</td>

        </tr>

        <tr>
            <td>Grzebień(1.29PLN/szt)</td>
            <td>$grzebieniPHP</td>
        </tr>

        <tr>
            <td>Suma</td>
            <td>$suma PLN</td>
        </tr>


    </table>

    <br><button><a href="index.php">Powrót do strony głównej</a></button>





END;
?>




</body>

</html>
