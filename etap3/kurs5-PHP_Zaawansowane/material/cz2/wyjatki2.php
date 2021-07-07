<?php

//Wlasna klasa wyjatkow
class InvalidPriceException extends Exception //dziedziczymy z standardowej klasy bledow
{

}

function setPrice($price)
{
    // Jesli if sie zgadza to wyrzuc nowy wyjatek
    if($price <= 0)
    {
        throw new InvalidPriceException('Cena musi byc wieksza niz zero');
    }
    else
    {
        return $price;
    }
}

function showName($name)
{
    if($name == '')
    {
        throw new Exception('Ogolny blad');
    }
    else
    {
        return $name;
    }
}

//Blok do bledow
try// sproboj
{
    echo setPrice(200);
    echo "<br>";
    echo showName('Kurs php');
    echo "<br>";

}
catch (InvalidPriceException $e)// zlap wyjatek z naszej klasy wyjatkow
{
    echo "Wyjatek: ". $e->getMessage();
}

catch (Exception $e)// Wyjatek standardowy
{
    echo $e->getMessage();
}

//Nie przerywa dalszej czesci programu
echo "Dalsza czesc programu";















