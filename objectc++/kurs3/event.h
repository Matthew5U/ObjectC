#include <iostream>

using namespace std;

class Event
{   
    // moglibysmy wpisac private: zeby zabezpieczyc dane przed ich nadpisaniem ale nie dajac nic automatycznie dane sa w klauzuli private

    int day, month, year;
    int hour, minutes;
    string name;

    public: // tutaj chcemy aby metody byly publiczne gdyz chcemy wywolywac je z main()

    // metody nizej powinny zawierac mechanizm kontroli bledow, atrybuty wyzej sa prywatne a zapisac je mozemy przez uzycie ponizszych metod
    
    Event(string="brak", int=1, int=1, int=2020, int=0, int=0); // tworzymy konstruktor, nazywa sie tak samo jak klasa, podajemy typy argumentow i nie potrzebne jest podawanie nazyw argumentow(Event(nazwa wydarzenia, dzien, miesiac, rok, godzina rozpoczecia, minuta rozpoczecia))
    // tak zbudowany konstruktor jest po ta aby kiedy programista stwozy obiekt ale nie przepisze mu wartosci, konstrukotr wtedy przypisuje mu domyslnie 

    ~Event(); // Nie moze miec argumentow
    
    void load(); // wczyta nam wydarzenie
    void show(); // wyswitli wydarzenie
};
