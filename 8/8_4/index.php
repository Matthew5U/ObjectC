<?php
class User {
	// Wlasciwosci
	public $id;
	public $name;
	public $email;
	public $password;

	// Konstruktor
	public function __construct( $id, $name, $email, $password)
	{
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

$janusz = new User( 1, 'Janusz', 'januszek@o2.pl', '12haslo');
$janusz->showUserInfo();






















