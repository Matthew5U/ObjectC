#include <iostream>
#include "friends.h"

using namespace std;

Point::Point(string n, float xx, float yy)
{
    // Ustawiamy atrybuty
    name=n; // name to n
    x=xx; // na potrzeby zrozumienia dzialania porgramu nazwane zostalo xx aby zrozuzmiec co do czego jest dopisywane | Posiada wartosci domysle
    y=yy; 
}

void Point::load()
{
    cout << "Podaj x: "; 
    cin >> x;

    cout << "Podaj y: ";
    cin >> y;

    cout << "Nazwa punktu: ";
    cin >> name;
}

Rectangle::Rectangle(string n, float xx, float yy, float w, float h)
{
    name = n;
    x = xx;
    y = yy; 
    width = w;
    height = h;
}

void Rectangle::load()
{
    /* SPRAWDZAMY CZY PRACUJEMY NA ORYGINALACH CZY KOPIACH
    cout << "Podaj x lewego dolnego naroznika: ";
    cin >> x;
    cout << "Podaj y lewego dolnego naroznika: ";
    cin >> y;
    cout << "Podaj szerokosc: ";
    cin >> width;
    cout << "Podaj wysokosc";
    cin >> height;
    cout << "Podaj nazwe prostokata: ";
    cin >> name;
    */
    cout << endl << "Nazwa obiektu: " << name << endl; // Wypisujemy nazwe kwadratu po to by zobaczyc czy pracujemy na kopiach czy oryginalach
}
