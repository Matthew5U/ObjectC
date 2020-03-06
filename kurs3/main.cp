#include <iostream>
#include "event.h"

using namespace std;

int main() 
{   
    cout << endl;

    // Event e1("Spotkanie ze znajomymi", 6, 8, 2020, 8, 15); // wydanierze | tu nastapi wywolanie konstrukotra | jednak jest to klopotliwe i wartosci domyslne mozna dodac do pliku *.h
	
    Event e1; // nie podalismy wartosci dla obiektu e1 dlatego konstrukotr przypisze mu wartosci domyslne

    Event e2("KONIEC SWIATA"); // podaja wartosci w obiekcie od lewej strony konstrukotr przypisuje reszte z domyslnych
    // budujac konstukotr nalezy ukladac wartosci najczesciej sie zmieniajace z lewej strony, gdyz wartosci domyslne bede latwo dopisywane 
    
    e1.show();
    e2.show();

    cout << endl;
    return 0;
}
