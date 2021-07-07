<!DOCTYPE html>
<html>
    <head>
        <title>Produkty</title>
        <meta charset="UTF-8" />
    </head>
    
<body>

    <h1>Lista rekordów</h1>
    
    <?php

        //dolaczenie pliku odpowiedzialne za polaczenie

        include('db_connect.php');

        if($result = $mysqli->query("SELECT * FROM poducts ORDER BY id"))
        {
            if($result->num_rows > 0)
            {
                echo "<table border='1' cellpadding='10'>";

                echo "<tr><th>ID</th><th>Nazwa</th><th>Kategorie</th></tr>";

                while($row = $result->fetch_object())
                {
                    echo "<tr>";
                    echo "<td>".$row->id."</td>";
                    echo "<td>".$row->name."</td>";
                    echo "<td>".$row->category."</td>";
                    //Odnosniki edycyjne
                    echo "<td><a href='records.php?id=".$row->id."'>Edytuj</td>"; // a - odpowiada za edycje i wprowadzenie rekordu
                    echo "<td><a href='delete.php?id=".$row->id."'>Usun</td>"; // a - odpowiada za usuwanie rekordu
                    echo "</tr>";

                }

                echo "</table>";
            }
            else
            {
                echo "Brak rekordow";
            }
        }
        else
        {
            echo "Blad: ". $mysqli->error; // Zwracanie bledu
        }

        $mysqli->close(); //Zamykamy polaczenie
    ?>
    
    <a href="records.php">Dodaj nowy produkt</a>

</body>

</html>
