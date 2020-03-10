#include <iostream>

using namespace std;

// Sprawdzmy czy dany punkt na plaszczznie kartezjańskiej lezy w prostokacie(rectangle)

class Rectangle; // Deklarujemy klase prostokata pozniej ale w klasie punkt uzywamy klasy prostokata(rectangel) dlatego deklarujemy wyzej zeby klasa punkt(Point) wiedziala ze isniteje taka klasa jak prostokat i ze zozstanei zdefiniowana pozniej

class Point
{
    string name; // nazwa punktu
    float x, y;

    public:
        Point(string="A", float = 0, float = 0);
        void load(); // mechanizm kontroli bledu jest dodawany w tym miejscu
        friend void judge(Point &p, Rectangle &r); // naglowek funkcji zaprzyjaznionej musi byc dokaldnie taki sam jak w funckji zaprzyjaznionej i w klasie ktora go deklaruje jako funkcja zaprzyjazniona
};

class Rectangle
{
    string name; // nazwa prostokata
    float x, y, width, height;

    public:
        Rectangle(string="Brak", float=0, float=0, float=1, float=1); // nazwa prsotokata domyslna to brak. poczatek w ukladnie to (0,0) a dlugosc i szerkosc po 1

        void load(); // (mechanizm kontroli bledow byl by umieszczony tutaj) 
        friend void judge(Point &p, Rectangle &r);
};
