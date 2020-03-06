#include <iostream>
// dodajemy plik z naglowkami do naszego
//pliku cpp. " " oznacza szukaj w naszym folderze
//<> szukaj w instalatorze
#include "question.h"
#include <fstream> // skorzystanie z pliku tekstowego
#include <cstdlib> // uzycie funkcji exit


using namespace std;

// WCZYTUJE PLIK
/* chodzi mi o metode bedaca czescia klasy pytanie
robimy tak gdyz jezeli bylo by samo load() to jesli by istniala
by dziekolwiek taka funkcja to porgram nie wiedzial by 
czy chodzi o mteode czy funkcje
:: <-- operator zasiegu jesli bylo by w jendym pliku cialo i naglowek 
to nie potrzebny byl by operator zasiegu
*/
void Question::load()
{
    fstream file;
    file.open("quiz.txt", ios::in); // in jest metoda klasy ios
    
    if(file.good()==false) // file to obiekt i wywolujemy metoode good (:D)
    {
        cout << "Nie udalo sie otworzyc plik";
        exit(0);
    }

    int numberOfLine = (number-1)*6+1; //numer lini jaki zaczniemy czytac w pliku
    // wzor mowi numer lini = (numer pytania - 1) * 6+1 // dla pierwszego pytania 1 
    // dla drugiego pytania 7 ( bo co 7 zmienia sie nasze pytanie w czytam pliku) 
    // tak bedzie wczytywal nasze pytania  
    
    // dwie zmienne do czytania lini w pytaniu
    int currentLine = 1; // bedzie inkrementowana po kazdej lini zeby zobaczyc na ktorym miejscu juz jest
                        // mowi nam o tym ile lini juz przeczytalismy ( a mamy przeczytac 6)
    
    string lineInQuiz; // musimy gdzies przechowywac nasza przeczytana linie w quizie

    // petla czytajaca z pliku
    while(getline(file, lineInQuiz))
    {
        // jesli currentLine rowna sie numer lini (czyli pytanie)
        if(currentLine == numberOfLine)
        {
            contents = lineInQuiz; // jesli linia 1=1,7 co szesc to wiemy ze jst to pytanie i wpisujemy do naszej zmiennej liniaWQuizie
        }
        // jesli wiemy ze linia pierwsza jest pytaniem to nastepna linia jest proponowana odpowiedzia czyli a
        if(currentLine == numberOfLine+1) a = lineInQuiz; // bo 1+1 =2 a to jest druga linia
        if(currentLine == numberOfLine+2) b = lineInQuiz; // bo 1+2 =3 linia
        if(currentLine == numberOfLine+3) c = lineInQuiz; // bo 1+3 =4 linia
        if(currentLine == numberOfLine+4) d = lineInQuiz; // bo 1+4 =5 linia
        if(currentLine == numberOfLine+5) correct = lineInQuiz; // bo 1+5 =6 a to jest poprawna dopwiedz


        currentLine++; // chcemy przeczytac 6 lini czyli jedno pytanie dlatego bedzimy zliczac ile juz przeczytalismy lini

    }

    file.close(); // pamietamy o zamknieciu

}

// WYPISUJE NA EKRANIE PYTANIA i uzytkownik wpisuje odpowiedz
void Question::ask()
{
    cout << endl << contents << endl;
    cout << a << endl;
    cout << b << endl;
    cout << c << endl;
    cout << d << endl;
    cout << "--------------------" << endl;
    cout << endl << "Odpowiedz: ";
    cin >> answer;

}

// SPRAWDZA POPRAWNOSC ODPOWIEDZI
void Question::check()
{
    if(correct==answer)
    {
        point=1;
    }
    else 
    {
        point = 0;
    }
}
