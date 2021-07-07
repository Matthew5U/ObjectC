<?php

class Product
{
    function showPrice()
    {

    }

    function showName()
    {

    }

}

$methods = get_class_methods('Product'); // Zmienna przechowywujaca metody
foreach($methods as $method)
{
    echo '<p>' .$method . '</p>';
}

if(method_exists('Product', 'showPrice'))
{
    echo 'Metoda showPrice istnieje';
}
else
{
    echo 'Metoda showPrice nie istnieje';

}

?>







