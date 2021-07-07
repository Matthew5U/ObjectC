<?php

    session_start();

    // Przetwarzanie formularza z tej strony

    // Jesli istnieje jakakolwiek zmienna z formularza to nastapilo przslanie formularza
    // jesli nie istnieje to znaczy ze nie nastailo przeslanie formularza
    if(isset($_POST['email']))
    {
        // Udana walidacja? Zalozmy ze tak
        // UStawiamy flage na true, jesli nie przejdzie jakiego testu to zmienimy flage 
        //na koncu i wtedy sprawdzimy jaka jest flaga
        $wszystko_OK=true;


////////// SPrawdzamy poprawnosc nick ///////////////////////////////////////
        $nick = $_POST['nick'];

        // Nick ma byc od 3 do 20 znakow i ma sie skladac ze znakow alfanumerycznych

        // Sprawdzenie dlugosci nicka
        if(strlen($nick)<3 || (strlen($nick)>20))
        {
            // flaga na false
            $wszystko_OK=false;
            // ustawiamy zmienna e_nick - czyli error nicka | Wpisujemy błąd 
            $_SESSION['e_nick'] = "Nick musi posiadac od 3 do 20 znakow";
        }

        // sprawdzamy czy nick sklada sie ze znakow alfanuemrycznych. funckja zwraca true albo false z tad ten if
        if(ctype_alnum($nick)==false)
        {
            $wszystko_OK = false;
            $_SESSION['e_nick']="Nick moze skladac sie tylko z liter i cyfr (bez polskich znakow)";
        }



////////// Sprawdzamy porpawnosc email /////////////////////////////////////
        $email=$_POST['email'];
        //filter_var - przefiltruj zmienna w spospob okreslony przez rodzaj filtru
        
        //zmienna emailB jest emailem po sanityzacji
        //sanityzujemy $email 
        //FILTER_SANITIZE_EMAIL - stala do filtrowania emailow. ucina zle znaki np ł
        $emailB = filter_var($email,FILTER_SANITIZE_EMAIL);

        //FILTER_VALIDATE_EMAIL - zwaliduj czy email jest poprawny
        // lub emailB jest rozny od emaila przysłanego 
        // JEsli email po walidacji rowny jest flase lub po sanityzacji rozni sie wiec cos jest nie tak
        if ((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
        {
            $wszystko_OK=false;
            $_SESSION['e_email']="Podaj poprawny adres email";
        }


////////// Sprawdzamy porpawnosc hasla /////////////////////////////////////
        $haslo1 = $_POST['haslo1'];
        $haslo2 = $_POST['haslo2'];

        // haslo ma byc od 8 do 20 znakow

        // jesli jest mniejsze lub wieksze to nie przejdzie
        if((strlen($haslo1)<8) || (strlen($haslo1)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków";
        }

        //Drugie haslo sprawdzamy//////////////////////////////////////

        if($haslo1!=$haslo2)
        {
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Hasła nie są takie same";
        }

        //haslo zahashowane
        //passord_hash hashuje nam haslo w php
        //Password_default to stala oznaczajaca: uzyj najsilniejszego algorytmu hashujacego jaki jest dostpeny
        //aktualnie jest to algorytm bcrypt (zalecana dlugosc komorki tekstowej w bazie przechwywyujaca hash to 255znakow)
        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

        //echo $haslo_hash; exit(); <- pokazuje hashasla

////////// Czy zaakceptowano regulami /////////////////////////////////////


        // Jesli regulami jest zaznaczony to da nam on
        // jesli nie jest zaznaczony da nam blad bo nie wyswietli ze instiniej globalna zmienna regulami
        //echo $_POST['regulamin']; exit();

        if(!isset($_POST['regulamin']))
        {
            $wszystko_OK=false;
            $_SESSION['e_regulamin']="Potwierdz ackeptacje regulaminu";
        }

////////// sprawdzanie recaptch /////////////////////////////////////
        //Sekretny klucz recpaty
        $sekret = "6LeCc-IUAAAAABf2isBt_9VSSpLEu3ayLaYb1WyR";

        //file_get_contents pobierz zawartosc pliku do zmiennej
        //zmienna metoda get ?secret bo to skrypt googla
        //wpisujemy nasz klucz sekretny
        // & <-- doklejamy druga zmienna w metodzie get
        // i doklejamy odpowiedz z naszej recaptchy a to siedzi w $_POST['g-recaptch-rsponse']
        $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

        //serwer googla przysle nam plik w json
        // dekodujemy plik
        $odpowiedz = json_decode($sprawdz);

        // sprawdzamy recpatch
        // pamietamy ze przed publikacja strony zakladamy nowe kody dla naszej utowrzonej strony
        if($odpowiedz->success==false)
        {
            $wszystko_OK=false;
            $_SESSION['e_bot']="Potwierdz ze nie jestes botem!";
        }

///////// Sprawdzamy czy ktos znajduje sie juz w bazie o podanym loginie ub haslo/////////


        //Zapamietaj wprowadzone dane
        //fr_ jest to formularz rejestracji
        $_SESSION['fr_nick'] = $nick;
        $_SESSION['fr_email'] = $email;
        $_SESSION['fr_haslo1'] = $haslo1;
        $_SESSION['fr_haslo2'] = $haslo2;

        //akceptacja regulaminu
        if(isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;








        require_once "connect.php";

        // Taka linijk mowi ze chcemy aby byly rzucane wyjatki a nie o ostrzezenia php
        mysqli_report(MYSQLI_REPORT_STRICT);

        //sproboj wykonac
        try
        {
            // Polaczenie do bazy danych
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            
            //connect_ernno rowny zero oznacza, iz ostatnio podjeta proba polaczenia sie z baza zakonczyla sie sukcesem
            if($polaczenie->connect_errno!=0)
            {
                // rzuc nowym wyjatkiem
                // czyli pzekazuje dalej
                //mysqli_connect_erno <- funckja zwraca opis do sytuacji
                throw new Exception(mysqli_connect_errno());
            }

            //sprawdzamy istnienie maila
            else
            {
                // Czy email juz istnieje?////////////////////////////////////////////////////
                // takie zapytanie wyciagnei nam tylko id o nazwie emiail rowny emailowi podanemu przez uzytkownika
                $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");

                // Jesli da false resultat to rzuc wyjatkiem
                // i pokaz na ekranie opis bledu ktory jest przypisany do identyfikator $polaczenie
                if(!$rezultat) throw new Exception($polaczenie->error);
                
                //tworzymy zmienna mowiaca ile jest maili takich w tabeli
                $ile_takich_maili = $rezultat->num_rows;

                //ta linijka mowi nam ze ktos juz istnieje o takim mailu, jesli tak to wyrzuca blad
                if($ile_takich_maili>0)
                {
                    $wszystko_OK=false;
                    $_SESSION['e_email']="Istnieje juz taki mail";
                }





                // Sprawdzamy teraz czy istniej login taki sam w bazie///////////////////////
                // takie zapytanie wyciagnei nam tylko id o nazwie user w bazie danych rowny $nick czyli podanego przez uzytkownika jest taki sam?
                $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");

                // Jesli da false resultat to rzuc wyjatkiem
                // i pokaz na ekranie opis bledu ktory jest przypisany do identyfikator $polaczenie
                if(!$rezultat) throw new Exception($polaczenie->error);
                
                //tworzymy zmienna mowiaca ile jest maili takich w tabeli
                $ile_takich_nickow = $rezultat->num_rows;

                //ta linijka mowi nam ze ktos juz istnieje o takim mailu, jesli tak to wyrzuca blad
                if($ile_takich_nickow>0)
                {
                    $wszystko_OK=false;
                    $_SESSION['e_nick']="Istnieje juz taki uzytkownik wymysl cos innego";
                }


//////////////////// Jesli na koncu wszystko sie udalo to dodajemy gracza//////////////////
                if($wszystko_OK == true)
                {
                    // Hurra, wszystkie testy zaliczone,dodajemy gracza
                    //echo "Udana walidacja"; exit();
                    

                    //Umieszczanie nowego uzytkownika do bazy danych
                    // najpierw wkaldamy id wiec zapisujemy null bo mamy ustawiony auto increment
                    // kazdy dostanie 100 wegla kamienia  drewna oraz 14 dni premium za rejestracje
                    // now() zwraca beirzaca date i czas 
                    // interval - interwal 14 dni
                    if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email',  100, 100, 100, now() + INTERVAL 14 DAY)"))
                    {
                        //jesli tu jestesmy to znaczy ze sie udalo
                        $_SESSION['udanarejestracja']=true;
                        header('Location: witamy.php');
                    }
                    // jesli nie udalo sie dodac to jest else
                    else
                    {
                        throw new Exception($polaczenie->error);
                    }



                }


                // zamykamy poalczenie jesli udalo sie zalogowac do bazy
                $polaczenie->close();
            }

        }
        //jesli sie nie uda to zlap wyjatek
        catch(Exception $e)
        {  
            echo '<span style="color: red;">Błąd serwera</span>';
            //wypisanie tresci wyjatku ktory siedzi w $e dla developerow tylko
            //usuwamy to gdy puszczamy serwis globalnie
            echo '<br>Informacja developerska: '.$e;
        }










    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Załóż darmowe konto</title>
    <meta name="description" content="">
    <meta name="keywords" content="" >
    <meta htp-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <!-- recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <style>
        
        .error
        {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }

    </style>
</head>



<body>
   
    <form method="post">

        Nickname: <br><input type="text" value="<?php
        //tutaj bedzei zapmietywac wpisane dane
        if(isset($_SESSION['fr_nick']))
        {
            echo $_SESSION['fr_nick'];
            unset($_SESSION['fr_nick']);
        }

        ?>" name="nick"><br>

        <?php
            if(isset($_SESSION['e_nick']))
            {
                // Jesli istnieje zmienna e_nick to wyswietl to 
                echo '<div class="error">'.$_SESSION['e_nick'].'</div>';

                // Usuwamy zmienna bo nawet jesli wpiszemy pozniej poprawy nick
                // to zmienna dalej bedzie istniec i wysiwetlac nam blad

                unset($_SESSION['e_nick']);

            }
        ?>


        E-mail: <br><input type="text" value="<?php
        //tutaj bedzei zapmietywac wpisane dane
        if(isset($_SESSION['fr_email']))
        {
            echo $_SESSION['fr_email'];
            unset($_SESSION['fr_email']);
        }

        ?>" name="email"><br>

        <?php
            if(isset($_SESSION['e_email']))
            {
                // Jesli istnieje zmienna e_email to wyswietl to 
                echo '<div class="error">'.$_SESSION['e_email'].'</div>';

                // Usuwamy zmienna bo nawet jesli wpiszemy pozniej poprawy nick
                // to zmienna dalej bedzie istniec i wysiwetlac nam blad

                unset($_SESSION['e_email']);

            }
        ?>


        Hasło: <br><input type="password" value="<?php
        //tutaj bedzei zapmietywac wpisane dane
        if(isset($_SESSION['fr_haslo1']))
        {
            echo $_SESSION['fr_haslo1'];
            unset($_SESSION['fr_haslo1']);
        }

        ?>" name="haslo1"><br>

        <?php
            if(isset($_SESSION['e_haslo']))
            {
                // Jesli istnieje zmienna e_haslo to wyswietl to 
                echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';

                // Usuwamy zmienna bo nawet jesli wpiszemy pozniej poprawy nick
                // to zmienna dalej bedzie istniec i wysiwetlac nam blad

                unset($_SESSION['e_haslo']);

            }
        ?>


        Powtórz hasło: <br><input type="password" value="<?php
        //tutaj bedzei zapmietywac wpisane dane
        if(isset($_SESSION['fr_haslo2']))
        {
            echo $_SESSION['fr_haslo2'];
            unset($_SESSION['fr_haslo2']);
        }

        ?>" name="haslo2"><br>

        
        <!-- Label tworzy jedna calosc -->
        <label>
            <input type="checkbox" name="regulamin" <?php
            if(isset($_SESSION['fr_regulamin']))
            {
                echo "checked";
                unset($_SESSION['fr_regulamin']);
            }
            ?> 
            > Akceptuję regulamin
        </label>

        <?php
            if(isset($_SESSION['e_regulamin']))
            {
                // Jesli istnieje zmienna e_email to wyswietl to 
                echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';

                // Usuwamy zmienna bo nawet jesli wpiszemy pozniej poprawy nick
                // to zmienna dalej bedzie istniec i wysiwetlac nam blad

                unset($_SESSION['e_regulamin']);

            }
        ?>

        <!-- recaptcha --> 
        <div class="g-recaptcha" data-sitekey="6LeCc-IUAAAAAE54n8nyDBrlHFCz0v883AOlg_4w"></div>

        <?php
            if(isset($_SESSION['e_bot']))
            {
                // Jesli istnieje zmienna e_email to wyswietl to 
                echo '<div class="error">'.$_SESSION['e_bot'].'</div>';

                // Usuwamy zmienna bo nawet jesli wpiszemy pozniej poprawy nick
                // to zmienna dalej bedzie istniec i wysiwetlac nam blad

                unset($_SESSION['e_bot']);

            }
        ?>

        <br>

        <input type="submit" value="zarejestruj sie">

    </form>





</body>

</html>
