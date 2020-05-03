<?php
$orderValue = 288;
$productCategory = 'Tablety';

if ($orderValue >= 300 /*&&*/ || $productCategory == 'Tablety')
{
    echo 'Klient otrzyma rabat 10%';
}
else
{
    echo 'Brak rabatu';
}






