#include <iostream>

using namespace std;


// Klasy abstrakcyjne
class Shape // Klasa abstrakcyjna o nazwie ksztalt
{
    public:
    virtual void calculateField() = 0; // Bedzie zawsze przeslonieta przez metody z klasy konkretnej. przypisanie 0 mowi o funkcji czystej i uzywa sie tego przypisania gdyz ta metoda zawsze bedzie przeslonieta wiec nie potrzebne jest umieszczanie jakiejkolwiek instrukcji
};

// Klasy konkretne

class Round :public Shape // Klasa kolo
{
    float r; // promien

    public:
    
    Round(float x) // x - promien. Odpowiada za ustawienie promienia
    {
        r = x;
    }
    
    virtual void calculateField() // mozna ale nie trzeba uzyc w klasie konkretnej slowa virtual. wstawienie slowka daj znac ze funkcja zostala zadeklarowana gdzies wyzej w hierarchi jak wirtulna 
    {
        cout << "Pole kola: " << 3.14*r*r << endl;
    }

};

class Square :public Shape
{
    float a; // dlugos boku

    public:
    
    Square(float x) // ustawiamy dlugos boku
    {
        a=x;
    }

    virtual void calculateField()
    {
        cout << "Pole kwadratu: " << a*a << endl;
    }
};

// Uniwersalna Funkcja
void calculations(Shape *x)
{
    x -> calculateField();
}



int main() 
{   
    cout << endl;

    Round k(1); // tworzymy obiekt kolo o wartosci 1 jednostki

    Square s(2); // kwadrat
	
    Shape *wsk;
    wsk = &k;
    wsk -> calculateField();

    wsk = &s;
    wsk -> calculateField();

    calculations(wsk);

    cout << endl;
    return 0;
}
