<?php

class Abc
{
    // Bez slowka var przy modyfikaotrach dostepu
    public $x = 100; // Dostep z kazdego miejsca
    protected $y = 101; // Dostep tylko w tej klasie albo klasie dziedziczacej
    private $z = 102; // Dostep tylko wewnatrz tej klasy

    // Funkcja do wyjecie wszystkich rodzajow skladnikow
    // Mozliwosc dodania dostepu do metod
    function displayProperties()
    {
        echo $this->x.'<br>';
        echo $this->y.'<br>';
        echo $this->z.'<br>';
    }
}

class Def extends Abc
{
    function show()
    {
        // W tymi miejscu dostep do
        // public
        // protected
        // nie private
        
    }
}

$xyz = new Abc();

// Dostep tylko do public 
echo $xyz->x;

// Dostep do chronionych elementow
$xyz->displayProperties();
