#include <iostream>

using namespace std;

class Question
{
    public:

    string contents; // tresc pytania
    string a, b, c, d; // odpowiedzi
    int number; // numer pytania 
    string correct; // poprawna odpowiedz na pytanie
    string answer; // odpowiedz uzytkownika
    int point; // (1 albo 0) zmienna odpowiedzialna za zliczanie punktow za poprawna odpoweidz
                
    // nie dozwolone inicjalizacja zmiennej w klasie, mozna to zrobic tylko przez 
    //metodenie dozwolone inicjalizacja zmiennej w klasie, mozna to zrobic tylko 
    //przez metode ( uzycie konstruktora)

    // METODY
    void load(); // wczytuje dane z pliku
    void ask(); // pokazuje pytanie, czyta odpowiedzi
    void check(); // sprawdz poprwanosc podanej odpowiedzi


};
