#include <iostream>
#include "question.h"

using namespace std;

int main() 
{   
    cout << endl;

    Question p[5]; //tablica 5 elementow ale indeksujemy od 0
    
    int suma=0; // bedzie zliczac punkty ktore uzyskalismy

    for(int i=0; i<=4; i++)
    {
        p[i].number=i+1; // plus jeden bo zaczniemy od 0 elementy tak jak jest zadelkarowane i a my musimy od lini 1 tak jak jest w notatniku numerowane
        p[i].load();
        p[i].ask();
        p[i].check();
        suma+=p[i].point;
    }
    


    cout << "Koniec quizu!" << endl;
    cout << "Zdobywasz: " << suma;

    cout << endl;
    return 0;
}
