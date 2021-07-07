<?php

    $lacze = mysqli_connect('localhost', 'skursow', 'haslo1'); // Polaczenie z baza danych
                                                                // 1.Adres serwer
                                                                // 2.Nazwa uzytkownika
                                                                // 3.Haslo uzytkownika
                                                                // 4.Wybor bazy

    $baza = mysqli_select_db('kursy', $lacze); // Wybieramy baze z ktora uzytkownik bedzie pracowal
                                                // 1. Nazwa bazy
                                                // 2. Podanie identyfiaktora polaczenia $lacze - nasza zmienna
    
    var_export($baza); // Wartosc funckji baza
                        // Jesli TRUE to nawiazalismy polaczeni
                        // Jesli FALSE to nie nawiazalismy polaczenia
    
    //$zpt = 'SELECT * FROM produkty'; // Tworzymy zapytanie do bazy

    //$zpt = 'DELETE FROM cennik WHERE id=10'; // Usuwanie

    $rezultat = mysqli_query($zpt, $lacze); // Funkcja ktora wykonuje zapytanie
                                            // 1. Nasze zapytanie
                                            // 2. Nasze polaczeni

    
    $podsumowanie = mysqli_affected_rows($lacze); // zwraca liczbe wierszy zmodyfikowanych

    echo $podsumowanie;

    /*
    while ($wynik = mysqli_fetch_assoc($rezultat)){ // Zwroci tablice asocjacyjna
                                                        // 1. Zmienna z zasobami czyli $rezultat

    // Czytelny kod za pomoca <pre>
    echo"<pre>"; // Znaczniki preformowane
                
    // print_r($wynik);  // zwraca rekordy do poki nie zostana wszystkie zwrocone

    print_r($wynik['nazwa'].' '.$wynik['cena']); // Wyswietlenie klucza nazwa i klucza cena
    echo"<pre>";

    }
    */










?>
