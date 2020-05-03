<?php
class User {
	// Wlasciwosci
	public $id;
	public $name;
	public $email;
	public $password;
	// Konstruktor
	public function __construct( $id, $name, $email, $password ) {
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
	}
	// Metody
	public function showUserInfo() {
		echo $this->id . '<br/>';
		echo $this->name . '<br/>';
		echo $this->email . '<br/>';
		echo $this->password . '<br/>';
	} 
	public function changePassword( $newPassword ) {
		$this->password = $newPassword;
	}
}

// Dziedziczenie
class Admin extends User
{
	public $privileges; // Uprawnienia admina
	public function setPrivileges( $privileges )
	{
		$this->privileges = $privileges;
	}
}

$janusz = new User( 230, 'Janusz', 'janusz@strefakursow.pl', 'fgGB43s' );
$janusz->showUserInfo();

$admin = new Admin(12, 'Ksawery', 'ks@o2.pl', 'has124');
$admin -> setPrivileges('Zmiana ustawien');
$admin -> showUserInfo();




























