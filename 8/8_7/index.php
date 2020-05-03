<?php
class Product {
	// Wlasciwosci
	private $id;
	private $name;
	private $price;
	// Konstruktor
	public function __construct( $id, $name, $price ) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
	}
	// Metody
	public function showInfo() {
		echo $this->id . '<br/>';
		echo $this->name . '<br/>';
		echo $this->price . '<br/>';
	}
}

$product = new Product(12, 'Produkt 1', 199);
echo $product->name; // Nie mozna bezposrednio
$product->showInfo();

