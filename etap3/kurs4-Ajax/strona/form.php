<?php
//Metoda GET
$email =($_GET["email"]);
$name =($_GET["name"]);
echo "Adres Email:";
echo $email;
echo "<br/>";
echo "Imię:";
echo $name;
?>


<?php
// Metoda POST
$email =($_POST["email"]);
$name =($_POST["name"]);
echo "Adres Email:";
echo $email;
echo "<br/>";
echo "Imię:";
echo $name;
?>
