<?php


if(isset($_FILES['file'])){ // Czy przeslanie formularza nastapilo
    
    $db = new mysqli('localhost','root','','products');
    
    //Zmienna przechowywujaca nazwe
    //real_escape_string - usuwanie znakow specjalnych
    $name = $db->real_escape_string($_FILES['file']['name']);
    $type = $db->real_escape_string($_FILES['file']['type']);
    //file_get_contents - zawartosc pliku
    $data = $db->real_escape_string(file_get_contents($_FILES['file']['tmp_name']));
    //intval - zamiana na liczbe calkowita
    $size = intval($_FILES['file']['size']);
    


    // Zapytanie
    $query = "INSERT INTO files (name,type,size,data,created) VALUES ('{$name}','{$type}','{$size}','{$data}',NOW())";
    
    //Zmienna przechowywujaca rezultaty
    $result = $db->query($query);
    
    if($result){// To plik zostal zapisany
        echo "Plik zapisany";
    } else {// Wyswietl blad
        echo "Blad";
    }
    
    $db->close();
    
}

/*
$validExt = array("txt","xml"); // Dozwolone rozszerzenia
$ext = end(explode(".", $_FILES['file']['name'])); // sprawdzamy ciag znaku na koncu rozszerzenia. explode - dzielimy naze gdzie limiterem bedzie kropka, 2 parametr to nazwa przeslanego pliku

//Walidacja przesylanego pliku
//Sprawdzamy typ pliku || typ pliku(czy to xml) || Wielkosc pliku jest mniejsza od 1kb && warunki po lewej porownujemy do tablicy 
if(($_FILES['file']['type'] == 'text/plain') || ($_FILES['file']['type'] == 'text/xml') && ($_FILES['file']['size'] < 1000) && in_array($ext, $validExt)){
        if($_FILES['file']['error'] > 0){ // Czy przesylanie nastapilo z bledem
        echo "Bład";
    } else { // Wszystko w porzadku
        echo "Nazwa: " . $_FILES['file']['name'] . "<br>"; // Odwolanie do pola 
        echo "Typ: " . $_FILES['file']['type'] . "<br>";
        echo "Rozmiar: " . $_FILES['file']['size'] . "<br>";
        echo "Katalog: " . $_FILES['file']['tmp_name'] . "<br>"; // Nazwa tymczasowego katalogu
        
        if(file_exists($_FILES['file']['name'])){ // Jesli plik istnieje
            echo "Plik " . $_FILES['file']['name'] . "juz instnieje";
        } else { // Jesli nie istnieje to mozna go zuploadowac
            move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['name'] );
        }
        
    }
} else {
    echo "nieprawidlowy plik";
}

*/



?>
