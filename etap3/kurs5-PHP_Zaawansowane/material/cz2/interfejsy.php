<?php

interface Product
{
    public function getProductInfo();
    public function getProductList();

}

class ListProducts implements Product
{
    public function getProductInfo()
    {
        
    }

    public function getProductList()
    {

    }

}

class AddProduct implements Product
{
    public function getProductInfo()
    {
        
    }

    public function getProductList()
    {

    }
}
// 1. Implementacja metody z interfejsu moze byc wykonana w klasie dziedziczacej po interfejsie
// 2. Jesli nasza klasa implementuje interfejs to musi deklarowac wszystkie metody z interfejsu
// 3. Kazda klasa implementujaca interfejs musi posiadac implementacje wszystkich metoda z interfejsu





