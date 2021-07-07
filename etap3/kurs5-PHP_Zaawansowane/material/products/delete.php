<?php

include('db_connect.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])) // Czy id zostalo przekazane
{
    $id = $_GET['id'];

    //Tworzymy zmienna trzymajacal zapytanie
    if($stmt = $mysqli->prepare("DELETE FROM products WHERE id= ? LIMIT 1"))
    {
        // Usuwanie rekordu
        $stmt->bind_param("i", $id); // Przekazujemy argumenty. i od int, s od string
        $stmt->execute();
        $stmt->close();
    }
    else
    {
        echo "Blad zapytania";
    }

    $mysqli->close();
    
    header("Location: index.php"); // PRzekierowanie do index.php po wykonaniu zapytania

}
else
{
    header("Location: index.php"); // PRzekierowanie do index.php jesli cos sie nie powiodlo
}






?>
