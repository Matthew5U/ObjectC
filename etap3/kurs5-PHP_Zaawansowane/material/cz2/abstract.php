<?php
//Klasa abstrakcyjna nie moze posiadac instacji czyli swoich obiektow

abstract class Product
{
    abstract protected function showClassName($param1, $param2);
    // Nie moze posiadac ciala metoda abstrakcyjna
    //{
    //}
}

class Soft extends Product
{
    // Tutaj implementujemy metode abstrakcyjna
    // Takie same parametry
    // Nie moze byc tutaj private a wyzej protected
    protected function showClassName($param1, $param2)
    {
        
    }
} 

$soft = new Soft();

// 1. Klasa abstrakcyjna nie moze posiadac swoich obiektow czyli instancji
// 2. Abstrakcyjna metoda nie moze posiadac ciala jedynie moze posiadac sygnature funckji
// 3. Metoda abstrakcyjna musi miec implementacje w dziedziczacej klasie
// 4. Parametry musza sie zgadzac w metodzie abstrakcyjnej i metoda w klasie 
//  dziedziczacej tez musi miec takie same parametry
// Takie samo zabezpieczenie czyli protected lub wyzszy
// 5. Nie moze byc metoda private w klasie dziedziczacej po klasie abstrakcyjnej w ktorej
// metoda jest protected lub wyzsza









