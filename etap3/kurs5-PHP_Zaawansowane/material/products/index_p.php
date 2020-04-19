<Doctype! html>
<html>
<head>
    <title>Produkty</title>
    <meta charset="utf-8" />
</head>

<body>

    <h1>Lista rekordów</h1>
    
    <?php
    
        include('db_connect.php');
        
        $records_per_page = 3; // Rekordow na stronie
        
        if($result = $mysqli->query("SELECT * FROM products ORDER BY id")){ // Tworzymy zapytanie
            if($result->num_rows != 0){ // Jesli zworcilo jakies rekordy 
                $total_records = $result->num_rows; // lacz liczba rekordow
                $total_pages = ceil($total_records / $records_per_page); // laczna liczba stron
                
                if(isset($_GET['page']) && is_numeric($_GET['page'])){ // Jst ustawiony i jest liczba 
                    
                    $show_page = $_GET['page']; // zmienna prechowywujaca strone
                    
                    if($show_page > 0 && $show_page <= $total_pages){ // zmienna jest wieksza od 0 i jest mniejsz lub rowna liczbie stron
                        $start = ($show_page-1) * $records_per_page; // Poczatek zakresu stron
                        $end = $start + $records_per_page; // Koniec zakresu stron
                    } else { // Number wnosi 0 lub wiekszy niz licbza stron
                        $start = 0; // Poczatek
                        $end = $records_per_page; // koniec - laczna liczba rekorodow na strone
                    }
                } else {// jesli nie jst ustawiony albo nie jest liczba
                    $start = 0;
                    $end = $records_per_page;
                }
                echo "<p><a href='index.php'>Zobacz wszystko</a> | Zobacz stronę: ";
                for($i = 1; $i <= $total_pages; $i++){ // Do poki istnieja strony
                        if(isset($_GET['page']) && $_GET['page'] == $i){ // Czy przekazana zostala strona
                            echo $i . " "; // Wyporwadzamy nuemr stron bez linku
                        } else { // Linki do pozostalych stron
                            echo "<a href='index_p.php?page=$i'>" . $i . "</a>";
                        }
                    }
                echo "</p>";
                
                // Tabela rekordow
                echo "<table border='1' cellpadding='10'>";
                //Naglowki
                echo "<tr><th>ID</th><th>Nazwa</th><th>Kategoria</th></tr>";
                for($i = $start; $i < $end; $i++){ //Poczatkowa strona to zmienna start
                    if($i == $total_records) {break;} 
                    
                    $result->data_seek($i); // wyniki zapytania. Biezaca wartosc i. Wygenerowanie odpowednich danych
                    $row = $result->fetch_row(); // Pobieramy jeden rzad wynikow
                    "<tr>";
                    echo "<td>" . $row[0] . "</td>"; // Pierwszy wiersz z tabeli
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td><a href='records.php?id='" . $row[0] . "'>Edytuj</a></td>"; // Odnosnik do edytowania
                    echo "<td><a href='delete.php?id='" . $row[0] . "'>Usuń</a></td>"; // USuwania
                    echo "</tr>";
                }
                echo "</table>";
                    
                
                
            } else {
                echo "Brak rekordów";
            }
        } else {
            echo "Błąd zapytania";
        }
        
        $mysqli->close();
    
    ?>
    
    <a href="records.php">Dodaj nowy produkt</a>

</body>
</html>
