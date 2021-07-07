<?php
// Metoda POST

$x= isset($_POST['x'])? (float)$_POST['x'] : 0.0; // Zadaj pytanie czy jest ustawiona ta wartosc, jezeeli tak to przyjmij ta wartosc. Jezli nie to przyjmij druga wartosc
$y= isset($_POST['y'])? (float)$_POST['y'] : 0.0; // Zadaj pytanie czy jest ustawiona ta wartosc, jezeeli tak to przyjmij ta wartosc. Jezli nie to przyjmij druga wartosc

// Czy x jakiekolwiek lub x rowne dokaldnie 0
if(($x ||  $x === 0.0) && ($y || $y ===0.0) && is_numeric($x) && is_numeric($y) ) // sprawdzamy czy istnieja zmienne i czy sa liczbami
{

        $sum = $x + $y;
    
}

echo $sum;

?>
