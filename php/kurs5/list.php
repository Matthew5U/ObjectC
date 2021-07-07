<?php
session_start();

// musimy tutaj zdefinowac gdyz uzytkownik jesli jest zalgowoany i odswiezu strone zostanei
//przeniesiony instrukcje nizej a tam $db musi miec otwieranie bazy dlatego tak postawnowiono aby otwarcie bazy nastepowal w tej linijce
require_once 'database.php';

//Jesli nie jestesmy zalogowani
if (!isset($_SESSION['logged_id']))
{
    // sprawdzenie to powinno odybwac wowczas gdy nie jestesmy zalogowani
    if(isset($_POST['login']))
    {
        // nie musimy wpisaywac filtru
        // idnetyfikator tet u filtrujaceg, czyli zgodnosc z jakim wyrazeniem bedziemy chcieli spawdzic 
        $login = filter_input(INPUT_POST, 'login');
        $password = filter_input(INPUT_POST, 'pass');

        //echo $login . " " . $password;



        //1. przygtouj (prepare) tresc kwerendy o etykiecie :parametr
        //2. Polacz (bind) ustawiona etykiete
        //3. wykonaj (execute) kwerende

        $userQuery = $db->prepare('SELECT id, password FROM admins WHERE login = :login');
        $userQuery->bindValue(':login', $login, PDO::PARAM_STR);
        $userQuery->execute();

        // musimy wyjac dane z bazy aby porownac cyz takie haslo i login isntieje

        // rowCount - sprawdza ile jest takich rekrodw ktore wpisalismy
        //sprawdzamy ile jest rekrodow i poruwnywujemy
        //echo $userQuery->rowCount();

        //2. sposob z fetch(wyciagnieciem daych)
        //dostaniemy to asocjacyjnie
        // wypisujemy np $user['id'] bo dalismy fetch
        $user = $userQuery->fetch();

        // jesli admin isntieje to mamy jeden rekord
        // jesli admin nie istnieje to jest pusta tablica
        //echo $user['id'] . " " . $user['password'];

/////////LOGOWANIE//////////////////////////////////////////////////////////////////////
        //if ktory mowi ze udalo sie zalogwac czy tez nie 
        // jesli tablica $user nie jest pusta to udalo sie znales jakis login i ma inna wartosc niz false 
        if ($user && password_verify($password, $user['password'])) // true jesli $user istnieje i zahashowane haslo ktore dostalismy do hasla ktore siedzi w bazie 
        {
            // zapamietujemy zalogowanego admina
            $_SESSION['logged_id'] = $user['id'];
            
            //usuwamy globalna jesli ktos podal nieprawdilowe wczesniej dane, nie ma potrzeby trzymania jej skoro juz puzytkownik podal poprawne dane
            unset($_SESSION['bad_attempt']);
        }
        else
        {
            $_SESSION['bad_attempt'] = true;
            header('Location: admin.php');
            exit();
        }




    }
    else
    {
        header("Location: admin.php");
        exit();
    }
}

// mozem swobodnie pokazac zawartosc admina gdyz funkcje podczas logowania wyrzucily by uzytkownika po prze exit() wczesniej zdefiniowane
// jesli nie jest zalogowany to przepusc go i zaloguj
// jesli jest to pokaz zawartosc admina
// nie trzeba dac prepare execute bo zadna czesc nie pochodzi od internauty wiec strzykiwanie sql mozemy wykluczyc
// wyjmujemy zawartsoc

//$db nasze polaczenie do bazy
// $userQuery jest obiektem PDO statmen
// zeby odniesc sie do tego obiektu co przechwuje to musimy uzyc metody na tym obiekcie np fetchALL
$usersQuery = $db->query('SELECT * FROM users');

//fetchALL() - zwroci wsyzstkie rekordy
// przyda nam sie to bo mamy duzo rekorodw

$users = $usersQuery->fetchALL();

//obiekt pdo statment
// nie jest stringem zeby tak to wypisac
//echo  $usersQuery; <- Object of class PDOStatement could not be converted to string

// to jest tablica
// wiec sie nie da z tablicy zrobic stringa
//echo $users; <-  Array to string conversion

//print_r <- drukuj rekursywnie
//print_r($users);
// dodstalismy po id jak i rowniez po numerze np. id =1 a w talbiicy rekord pierwszy to nie id 1 tylko 0 bo pierwszy elelemnt 
//Array ( [0] => Array ( [id] => 1 [0] => 1 [email] => adam@gmail.com [1] => adam@gmail.com ) 
//[1] => Array ( [id] => 2 [0] => 2 [email] => marek@gmail.com [1] => marek@gmail.com ) 
//[2] => Array ( [id] => 3 [0] => 3 [email] => anna@gmail.com [1] => anna@gmail.com ) itp

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Panel administracyjny</title>
    <meta name="description" content="Używanie PDO - odczyt z bazy MySQL">
    <meta name="keywords" content="php, kurs, PDO, połączenie, MySQL">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">

        <header>
            <h1>Newsletter</h1>
        </header>

        <main>
            <article>

                <table>
                    <thead>
                        <!-- pierwzy wiersz czyli <tr> -->
                        <tr>
                            <th colspan="2">Łącznie rekrdów 
                            <?= 
                            // rowCount liczba mowiaca ile jest zwroconcyh wierszy
                            $usersQuery->rowCount()
                            ?>
                            </th>
                        </tr>

                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            //wypisanie rekordow petla foreach
                            // as - jako nadanie aliasu
                            // $user to jest nasza zmienna teraz nazwa na potrzebu petli foreach
                            // nie musi byc iterowana bo petla sama wie ze ma sie skonczyc kidys juz wyjmie wszystkich userow
                            foreach($users as $user)
                            {
                                //klamry dla zmiennej {}
                                echo "<tr><td>{$user['id']}</td> <td>{$user['email']}</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>


                <p><a href="logout.php">Wyloguj</a></p>

            </article>
        </main>

    </div>

</body>
</html>
