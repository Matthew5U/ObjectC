<?php

//Podstawy Ajax z php

$kursy = array("Kurs Java", "Kurs C++", "Kurs C#", "Kurs php");

for($i = 0; $i < 4; $i++)
{
    echo $kursy[$i]."<br>";
}


// Walidacja formularza
// Waldacja zadanie
$email = empty($_GET["email"]); // Sprawdzamy pole email. Prawda jesli puste, false jesli bedzie cos zawieralo
if($email == false)
{
    echo "Powodzenie";
}
else
{
    echo "Uzupelnij email";
}


//Wprowadzanie rekordow do baz danych

    $polaczenie = mysqli_connect('localhost', 'root');
    $baza = mysqli_select_db('kurs_ajax', $polaczenie);

    //var_export($baza); // true jesli nawiaze polaczenie

    $tytul = $_GET['tytul'];
    $cena = $_GET['cena'];
    $kategoria = $_GET['kategoria'];

    $dodajprodukt = "INSERT INTO kursy (tytul, cena, kategoria) VALUES ('$tytul', '$cena', '$kategoria')";
    $wprowadz = mysqli_query($dodajprodukt, $baza);





// Wyswietlanie rekordow
$polaczenie = mysqli_connect('localhost', 'root');
$baza = mysqli_select_db('kurs_ajax', $polaczenie);

//var_export($baza); // true jesli nawiaze polaczenie

$pokazprodukty = "SELECT * FROM kursy";
$rezultat = mysqli_query($pokazprodukty, $polaczenie);

while($wiersz =mysqli_fetch_assoc($rezultat))

print_r($wiersz);



// Kolejne zadanie
$polaczenie = mysqli_connect('localhost', 'root');
$baza = mysqli_select_db('kurs_ajax', $polaczenie);

//var_export($baza); // true jesli nawiaze polaczenie

$pokazprodukty = "SELECT * FROM kursy ORDER BY id DESC";
$rezultat = mysqli_query($pokazprodukty, $polaczenie);

while($wiersz =mysqli_fetch_assoc($rezultat))

print_r($wiersz);



// Formatowanie tabel
$polaczenie = mysqli_connect('localhost', 'root');
$baza = mysqli_select_db('kurs_ajax', $polaczenie);

//var_export($baza); // true jesli nawiaze polaczenie

$pokazprodukty = "SELECT * FROM kursy ORDER BY id DESC";
$rezultat = mysqli_query($pokazprodukty, $polaczenie);


echo "<table id='kursy-tabela'>
<tr>
    <th>Tytul</th>
    <th>Cena</th>
    <th>Kategoria</th>
</tr>
";

while($wiersz =mysqli_fetch_assoc($rezultat)) // przy przejsciu bedzie tworzony wiersz
{
    echo "<tr>";
    echo "<td>".$wiersz['tytul']."</td>";
    echo "<td>".$wiersz['cena']."</td>";
    echo "<td>".$wiersz['kategoria']."</td>";
    echo "</tr>";
}
echo "</table>";

?>
