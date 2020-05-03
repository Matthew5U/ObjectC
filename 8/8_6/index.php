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

class Admin extends User {
	public $privileges;
	public function setPrivileges( $privileges ) {
		$this->privileges = $privileges;
	}

	/*
	// Nadpisanie metody
	public function showUserInfo() {
		echo $this->privileges . '<br/>';
	} 
	*/

	// Dodanie do metody nowej wartosci
	public function showUserInfo() {
		parent::showUserInfo();
		echo $this->privileges . '<br/>';
	} 
}

$admin = new Admin(12,'Ksawery','ksaweryk@strefakursow.pl','ffGB34s2');
$admin->setPrivileges('Zmiana ustawien');
$admin->showUserInfo();