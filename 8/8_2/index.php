<?php




class User {
    // Wlasciwosci klasy
    public $id;
    public $name;
    public $email;
    public $password;

    
}

$janusz = new User();
$janusz->id = 1;
$janusz->name = 'Janusz';
$janusz->email = 'janusz@o2.pl';
$janusz->password = 'k123';
echo $janusz->id . "<br>" ;
echo $janusz->name . "<br>" ;
echo $janusz->email . "<br>" ;
echo $janusz->password . "<br>" ;



















?>