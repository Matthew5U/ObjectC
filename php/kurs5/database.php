<?php

    //wymagaj raz config.php czyli hasel do bazy danych
    $config = require_once 'config.php';

    try
    {
    
        // $db = new PDO(1 szuflada, 2 szuflada = uzytkownik bazy, 3 szufalda = haslo dostepowe, 4 szuflada (opcjonalna) = tablica predefiniowanych opcji silnika(driver) bazy)
        // 1 szuflada - jakis silnik wybralismy, namiary na hosta, nazwe bazy, oraz uzywany charset
        //nowy obiekt klasy pdo
        $db = new PDO("mysql:host={$config['host']};dbname={$config['database']};charset=utf8", $config['user'], $config['password'], [
            PDO::ATTR_EMULATE_PREPARES => false, // wylaczylismy to wowczas zapytanie i faktyczne dane zostan wyslane oddzielnie 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // rzuci to wyjatek uzyteczynych podczas debugowania 
            ]);
        // silnik bazy - mysql
        // host zmienna z config i szufladka o nazwie host
        // zmienna dbname itp
    }
    // lapiemy wyjatki
    catch (PDOException $error)
    {
        echo $error;
        exit('Database error');
    }


?>
