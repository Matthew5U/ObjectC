#include <iostream>
#include <math.h>
using namespace std;

class Point
{
    float x, y; // wartosci  punktu w ukladzie karteznajnskim
    string name; // nazwa punktu

    public:
    
    void show()
    {
        cout << name << "(" << x << "," << y << ")" << endl;
    }

    Point(string n = "S", float a = 0, float b = 0)
    {
        name = n;
        x = a;
        y = b;
    }
};

class Round :public Point // klasa kolo dziedziczy publicznie po klasie punkt
{
    float r; //promien kola
    string name; // Przesloniecie zmiennej name z klasy punkt, ale to nic nie zmienia gdyz zmienna punkt jest dalej a my tworzymy nowa zmienna czyli kolo i bedzie mialo inna nazwe niz punkt

    public:

    void show()
    {
        cout << "Kolo o nazwie: " << name << endl;
        cout << "Srodek kola: " ;
        Point::show(); // wywolanie metody punkt(point) plus dodamy promien (zawraty jest tutaj cel dziedziczenia klas)
        cout << "Promien: " << r << endl; // i pokazujemy promien kola
        cout << "Pole kola: " << M_PI*r*r << endl;

    }

    Round(string nr = "Kolo", string np = "S", float a = 0, float b = 0, float pr = 1) //nr - nazwa kola np = nazwa punktu , wspolrzedne i pr -promien kola
    :Point(np,a,b) // wywolanie konstrukotra punkt | uzywanie konstruktora wewnatrz konstruktora. Konstruktora sie nie dziedziczy. Tutaj wywolujemy konstrukotr w konstruktorze | Nie moze konstruktor z rodzica zastapic konstruktora w klasie potomnej ale moze wziac udzial w jego tworzeniu
    {               // konstruktor round poustawia zmienne w konstrukotrze z klasy rodzica czy z klasy punkt
        name = nr; // nazwa kola
        r = pr; // promien = zmiennej promien kola (pr)
    }


};



int main() 
{   
    cout << endl;

    Round r1; // mimo tego iz klasa kolo dziedziczy po klasie punkt to jest osobna klasa wiec moze powstac bez tworzenia punktu z klasy punkt

    r1.show();

	
    cout << endl;
    return 0;
}
