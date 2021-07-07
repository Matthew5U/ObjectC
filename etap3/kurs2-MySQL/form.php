<?php

$lacze = mysqli_connect('localhost', 'skursow', 'haslo1')
or die("Brak polaczenia z baza "); // Przerwanie wykonywania skrytpu 

$baza = mysqli_select_db('kursy', $lacze); 


$tytul = trim($_POST['tytul']); // Zmienna do ktorej przypisujemy z strona.html nasza pierwsza przeslana wartosc o name = tytul
                                // Trim - usuwa wprowadzone spacje

$cena = $_POST['cena']; // Druga zmienna

//Sprawdzamy czy przeslane zmienne nie sa puste
// Sprawdzamy czy wprowadzona wartosc tytul nie jest liczba i wartosc cena jest liczba
if(!empty($tytul) && !empty($cena) && is_numeric($tytul)==false && is_numeric($cena))
{
    $zpt = "INSERT INTO cennik (tytul, cena) VALUES ('$tytul', '$cena')"; // Zapytanie umozliwiajace wpisanie danych do bazy

    $rezultat = mysqli_query($zpt, $lacze); 
}

else
{
    echo "Blad";
}


/*
// Komunikat o wprowadzeniu rekordu
if($rezultat){
    echo "Produkt zostal dodany"; // JEsli nasze zapytanie bedzie wykonane 
}
else
{
    echo "Blad";
}
*/
?>

