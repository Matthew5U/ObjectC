<?php

if(isset($_GET['id'])){ // Czy jest ustawiona zmienna id
    
    //intval - przekonwertowanie na liczbe calkowita
    $id = intval($_GET['id']);
    
    if($id <= 0){
        // Nieprawdilowy identyfikator
        die('Nieprawidlowe ID');
    } else {
        
        // Polaczenie z baza
        $db = new mysqli('localhost','root','','products');
        $query = "SELECT type,name,size,data FROM files WHERE id = {$id}";
        
        $result = $db->query($query);
        
        if($result){ // Jesli zapytanie nastapilo
            
            // Czy zostal zwrocony jeden rekord
            if($result->num_rows == 1){
                
                //Pobierz wynik jako obiekt
                $row = $result->fetch_object();
                
                //Tworzenie naglowka ktory bedzie interpretowany jako plik do pobrania
                // a nie otworzyc w oknie
                header("Content-Type: " . $row->type); //typ
                header("Content-Lenght " . $row->size); // wielkosc pliku
                //plik do pobrania - attachment, filename - nazwa pliku
                header("Content-Disposition: attachment; filename=" . $row->name);
                
                // wyprowadzamy date
                echo $row->data;
                
            } else {
                echo "Brak pliku z takim ID";
            }
            
        } else {
            echo "blad zapytania";
        }
        
        //Zamykamy polaczenie
        $db->close();
        
    }
    
}
