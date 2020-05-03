<?php
/*
* 401 - Nieautoryzowany dostęp  
* 404 - Nie znaleziono 
* 500 - Wewnętrzny błąd serwera
* Pozostałe - Nieznany kod
*/

$responseCode = 401;


switch($responseCode)
{
    case '401':
        echo 'Nieautoryzowany dostep';
    break;

    case '404':
        echo 'Nie odnaleziono strony';
    break;

    case '500':
        echo 'Wewntrzny blad serwera';
    break;

    default:
        echo ' Nie znany kod';
        
}


















