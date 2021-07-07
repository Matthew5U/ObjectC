<?php

function setPrice($price)
{
    // Jesli if sie zgadza to wyrzuc nowy wyjatek
    if($price <= 0)
    {
        throw new Exception('Cena musi byc wieksza niz zero');
    }
    else
    {
        return $price;
    }
}

//Blok do bledow
try// sproboj
{
    echo setPrice(200);
    echo "<br>";

}
catch (Exception $e)// zlap wyjatek
{
    echo "Wyjatek: ". $e->getMessage();
}

//Nie przerywa dalszej czesci programu
echo "Dalsza czesc programu";









