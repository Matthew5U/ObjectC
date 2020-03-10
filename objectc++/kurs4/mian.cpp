#include <iostream>
#include "friends.h"

using namespace std;

void judge(Point &p, Rectangle &r) // FUNKCJA ZAPRZYJAZNIONA | Sprawdza czy dany punkt lezy w prostokacie 
{
    r.name = "PODMIANA"; // Sprawdzamy czy pracujemy na oryginalach czy kopiach obiektow


    // Do funckji zaprzyjaznionej dajemy obiekta a nie wartosci obiektow gdyz bylo by to czasochlonne i latwo by mozna bylo sie pomylic
    if ( (p.x >= r.x) && (p.x <= r.x + r.width) && (p.y >= r.y) && (p.y <= r.y + r.height) ) // Dzieki temu warunkowi sprawdzimy czy nasz punkt jest w prostokacie
    {
        cout << endl << "Punkt " << p.name << " nalezy do prostokata " << r.name;
    }
    else
    {
        cout << endl << "Punkt " << p.name << " nie nalezy do prostokata " << r.name;
    }
    
    
}

int main() 
{   
    cout << endl;

    Point point1("A", 3, 17);
	
    Rectangle rectangle1("Prostokat oryginalny", 0, 0, 6, 4);

    judge(point1, rectangle1); // Po tej funckji sprawdzimy obiekt czy funkcja zaprzyjazniona zmienila obiekt o nazwie rectangle1

    rectangle1.load(); // Z funckji wczytaj zrobilismy funkcje pokazujaca czy pracujemy na oryginalach czy kopiach obiektu prostokat

    cout << endl;
    return 0;
}
