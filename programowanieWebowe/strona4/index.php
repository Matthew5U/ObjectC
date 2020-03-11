<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Dziennik szkolny</title>
	
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <link rel="stylesheet" href="main.css">

</head>

<body>

    <form action="index.php" method="post">
        <label>
            Podaj nazwe klasy: <input type="text" name="klasa">
        </label>

        <input type="submit" value="Pokaż oceny">

    </form>

<?php
    
    if(isset($_POST["klasa"])) // zabaezpieczenie. czy istnieje zmienna klasa. Jesli metoda get to $GET["klasa]
    {
        if(empty($_POST["klasa"]))
        {
            echo '<span style="color: yellow;">Nie podano klasy!<span>';
        }
        else
        {
            include "dbconnect.php";

            $conn = mysqli_connect($host, $user, $pass, $db) or die("Blad polaczenia"); // poalczenie do bazy danch
    
            mysqli_set_charset($conn, "utf8"); // ustawienie kodowania BEZ MYSNIKA

            /* Sposob wysietlenie polaczenia z baza
            if(!$conn)
            {
                echo "Błąd połaczeni";
            }
            else
            {
                echo "wąski jak ty mi zaimponowałeś w tej chwili";
            }
            */
           
            $klasa = $_POST["klasa"]; // wybieramy z inputa
    
    
            $q = "SELECT Imie, Nazwisko, Srednia_ocen FROM uczen, klasa WHERE nazwa='$klasa' AND klasa.id = uczen.id_klasy"; // wyjecie z bazy (zapytania)

            $result = mysqli_query($conn, $q) or die("Problemy z odczytem danych"); // wykonaj zapytanie (polaczenie,zmienna) i to co dostaniesz wrzuc do zmiennej


            $ile = mysqli_num_rows($result); // liczba wierszy w naszym rezultacie
            
            //echo $ile; exit(); //wyjscie

            if($ile == 0)
            {
                echo '<span style="color: red;">Nie ma takiej klasy!<span>';
            }

            else
            {
echo<<<END

    <table>
        <thead>
                <tr>
                    <th> Imie</th>
                    <th>Nazwisko</th>
                    <th>Średnia ocen</th>
                </tr>
        </thead>
        <tbody>

END;

                $sum = 0; // zmienna sumujaca oceny

                /* Sposob wyjecia danych*/ /* tutaj wykonuje sie dla wierszy*/
                while($row = mysqli_fetch_assoc($result)) // wyjecie jednego wiersza z tbeli danych otrzymanych
                {
                    echo "\r\n\t\t\t<tr>";
                    /* tutaj dla kolumn sie wykonuje */
                    foreach($row as $col) // wyciagnij szufladke i nazwij je jako $col
                    {
                        echo "<td>$col</td>";
                        
                    }
                    echo "</tr>";
                    
                    $sum += $row['Srednia_ocen']; 
                    
                    
                    // Jeden ze sposobow zapisu tabeli  echo "\r\n\t\t\t<tr><td>".$row['Imie']."</td><td>".$row['Nazwisko']."</td><td>".$row['Srednia_ocen']."</td></tr>"; // tablica row i skojarzenie czyli Imie warto zaznaczyc iz nazwa kolumny w sql ma byc taka sama w petli czyli np duza litera to uzyjemy dzej litery | KROPKA SKLEJA SIE NAPISY | \r\n\t wyrowna nam w podgladzie
                }
echo<<<END
\r\n
        </tbody>
    </table>
END;

                echo "<p>Średnia klasy: ".round($sum/$ile,2)."</p>";
            }

      

            mysqli_close($conn);
        }
    }


    

	
?>

</body>
</html>
