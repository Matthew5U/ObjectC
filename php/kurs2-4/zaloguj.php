<?php
    // Funkcja pozwalajaca dokumentowi korzystac z sesji
    // nie trzeba jej zamykac jak beze sql
    // w pliku do ktorego przekierujemy z tego pliku tez wpisujemy na gorze sesje aby tamten plik mogl korzystac 
    // ze zmiennych sesyjnych
    session_start();

    // Dzieki temu zabezpieczeniu nikt sie nie dostanie do tego pliku
    // wpisujac z palca sciezke do tego pliku zostanie sprawdzony if
    // ktory powie czy mozna puscic uzytkonika czy nie, bo jesli wpisze z reki adres 
    // tego pliku to zostanie przekierowany do tego pliku tylko bez wartosci login i haslo
    if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
    {
        header('Location: index.php');

        exit();
    }

    // Dolaczenie pliku
    require_once "connect.php";

    // Polaczenie do bazy danych
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    // Sprawdzenie polaczenia
    //connect_ernno rowny zero oznacza, iz ostatnio podjeta proba polaczenia sie z baza zakonczyla sie sukcesem
    if($polaczenie->connect_errno!=0)
    {
        // pokaz blad
        echo "Error:".$polaczenie->connect_errno;
    }
    else
    {
        //jesli nie ma bledu to przypisz podane przez uzytkownika login i haslo ktora uzytkowni wyslal metoda post
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        // htmlentities = encje html
        // encje sa to dopowiedniki znacznikow np w html < jest %lt;
        // automatycznie wpisuje nam encje html
        // ENT_QUOTES - zamien cudzyslowie i apostrofy
        // utf-8 ustawienie dobrego charsetu naszego czyli utf-8
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        //$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8"); <-- gdyz haslo bedziemy hashowac co nie wplynie na to ze ktos zrobi wstrzykiwanie sql

        //zapisanie do zmiennej zapytanie 
        //$sql = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'";

        // wez zapytanie o tres $sql i wykonaj kwerende | mechanizm zabezpieczajacy, jesli if sie nie wykona bo literowka byla to sie nei spelni
        // Przed sanityzacja danych
        //if ($rezultat=@$polaczenie->query($sql))


        // sprintf - kiedy natrafi na %s wstawi pierwszy argument ktory znajduje sie po przecinku
        // usprawnia lad i porzadek w zapisie
        // %s = tu wstawiamy lancuch(typ string)
        // mysqli_real_escape_strng -Funkcja, ktorej powinnismy uzyc na kazdym ciagu znakow, ktory otrzymalismy od uzytkownika i ktorego uzywamy w zapytaniu SQL
        if ($rezultat=@$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
        mysqli_real_escape_string($polaczenie,$login))))
        //zmieniamy. teraz wystarczy podac tylko login bo nie pozwolimy zeby istnialy dwa takie same login
        {
            // zmiena ile userow i wpisujemy do niej z $rezultat ilos wierszy
            $ile_userow = $rezultat->num_rows;
            
            // Jesli if sie wykona to oznacza to ze udalo sie komus zalogowac bo istnieje taki uzytkonwik
            if($ile_userow>0)
            {
                // fetch-assoc - utowrzy tablice assocjacyjna(skojarzeniowej) do ktorej powkladane beda zmiennne o takich samych nazwa jak nazyw kolumn w bazie 
                $wiersz = $rezultat->fetch_assoc();


                // Sprawdzamy czy zahashowane haslo zgadze sie z hasle otrzymanym
                // jesli haslo podane zgadza sie z hasle z wiersza w sql to
                // password_verify - sprawdzajaca hash hasla
                if(password_verify($haslo,$wiersz['pass'])) // mozna dopsiac == true ale nie trzeba. Tafunckja automatycznie sprawdza czy przesla veryfikacja hasla
                {

                

                    //Zmienna (flaga) mowiaca o tym ze jestesmy juz zalogowani i nie bedzie trzeba po wejsciu na index.php
                    // jeszcze raz sie logowac
                    $_SESSION['zalogowany'] = true;




                    // przyda sie do zapytan zmieniajacych jakies jego dane profilowe
                    $_SESSION['id'] = $wiersz['id'];
                    
                    // Tworzymy sesje czy tablice ktora jest globalnie widoczna tylko dla tworcy serwisu
                    // dzieki temu mozemy przesylac zmienne miedzy plikami do ktorych uzytkownik nie ma dostepu
                    // w sesji definiujemy własne zmienne. Tutaj stworzylismy tablice o nawie user
                    // aby sesja dziala musimy dodac funckje session_start na samym poczatku dokumentu
                    $_SESSION['user'] = $wiersz['user'];

                    // wyciagamy dane z bazy danych
                    $_SESSION['drewno']= $wiersz['drewno'];
                    $_SESSION['kamien']= $wiersz['kamien'];
                    $_SESSION['zboze']= $wiersz['zboze'];
                    $_SESSION['email']= $wiersz['email'];
                    $_SESSION['dnipremium']= $wiersz['dnipremium'];

                    // Jesli udalo sie zalogowac to usun z sesji zmienna blad 
                    // po co ma sie nazjdowac w sesji skoro sie zalogowalismy
                    // stworzona zostala w razie gdyby uzytkownik sie nie zaloowal 
                    // i jej zadaniem jest wysietlenie bledu
                    unset($_SESSION['blad']);

                    // Zwolnienie pamieci po zmiennej nie potrzebnych
                    // ZAWSZE CZYSCIMY REZULTATOW ZAPYTANIA
                    //close();
                    //free();
                    //free_result();
                    $rezultat->close();

                    // Jesli sie udalo zalogowac i istnieje uzytkownik to teraz nastepuje przekierowanie
                    // do strony z gra
                    // uzywamy header
                    header('Location: gra.php'); // idziemy do strony z gra
                }
                else// jesli haslo nie przejdzie porownania z haslem wpisanym
                {
                    $_SESSION['blad'] = '<span style="color: red"> Nieprawidłowe hasło!</span>';

                    header('Location: index.php');                
                }

            }

            //else czyli jesli login sie nie zgadza
            else
            {
                $_SESSION['blad'] = '<span style="color: red"> Nieprawidłowy login</span>';

                header('Location: index.php');                
            }
        }


        $polaczenie->close();
    }

    






?>
