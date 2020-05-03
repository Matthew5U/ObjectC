<?php
class User {
	// Wlasciwosci
	public $id;
	public $name;
	public $email;
	public $password; 
	// Metody
	public function showUserInfo()
	{
		echo $this->id. '<br>'; // Odwolanie do konkretnej wlasciwosci. Odwolanie do konkretnej wlasciwosci tego obiektu
		echo $this->name . '<br/>';
		echo $this->email . '<br/>';
		echo $this->password . '<br/>';
	}

	public function changePassword( $newPassword)
	{
		$this->password = $newPassword;
	}

	
}

$janusz = new User();
$janusz->id = 1;
$janusz->name = 'Janusz';
$janusz->email = 'janusz@strefakursow.pl';
$janusz->password = 'sadE532Sed';
$janusz->showUserInfo();
$janusz->changePassword('haslo_2');
$janusz->showUserInfo();
