<?php

$db = new mysqli('localhost','root','','products');

$query = "SELECT id,name FROM files ORDER BY id";

//Wykonanie zapytania
$result = $db->query($query);

//Wygenerowanie listy plikow z bazy 
if($result){
    
    if($result->num_rows > 0){ // Jesli zwroci wiersze to wykona kod
        
        echo "<ul>";
        while($row = $result->fetch_object()){ // wygenerowanie jednej pozycji na liscie
            echo "<li><a href='download.php?id=" . $row->id . "'>" . $row->name .   "</a></li>";
        }
        echo "</ul>";
        
    } else {
        echo "Brak plikow w bazie";
    }
    
} else {
    echo "blad zapytania";
}
