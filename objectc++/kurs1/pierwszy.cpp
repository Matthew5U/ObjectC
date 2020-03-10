#include <iostream>

// Program do zrozumienia klasy i obiektu

using namespace std;

// klasa zwierze
class Animal // Klasa z duzej litery
{  
    public: // prawa dostepu do zmiennych
    // atrybuty
    string type; // Cechy naszych obiektow(atrybuty)
    string name;
    int age;


    // metod dodanie zwierzecia (funkcja w klasie)
    void addAnimal()
    {
        cout << "DODAWANIE NOWEGO ZWIERZECIA DO BAZY: " << endl;
        cout << "Podaj gatunek: ";
        cin >> type;
        cout << "Podaj imie: ";
        cin >> name;
        cout << "Podaj wiek: ";
        cin >> age;
    }

    // metoda glos zwierzecia
    void voice()
    {
        if(type == "kot") cout << name << " lat " << age << ": Miau!";
        else if(type == "koza") cout << name << " lat " << age << ": Beee!";
        else if(type == "krowa") cout << name << " lat " << age << ": Muuu!";
        else cout << "Nieznany gatunek" << endl;
    }


}; // Posiada srednik aby odroznic klase od funkcji   

// Zadanie domowe stworzyc klase smaochod i wypisac wprowadzone dane
// Cel: zrozumienie jak sie tworzy klasy
class Car
{
    public:
    string mark;
    string model;
    int age;
    float mileage;

    // Dodanie samochodu przez uzytkownika
    void addCar()
    {
        cout << "DODAWANIE SAMOCHODU" << endl;
        cout << "Podaj marke samochodu" << endl;
        cin >> mark;
        cout << "Podaj model samochodu" << endl;
        cin >> model;
        cout << "Podaj rocznik smochodu" << endl;
        cin >> age;
        cout << "Podaj przebieg samochodu" << endl;
        cin >> mileage;
    }

    // Wypisanie danych smaochodu
    void printCar()
    {
        if(mark == "mercedes") 
        {
            cout << endl << "Marka samochodu: " << mark << endl;
            cout << "Model smaochod: " << model << endl;
            cout << "Rocznik samochodu: " << age << endl;
            cout << "Przebieg smaochodu: " << mileage << endl;
        }

        else if(mark == "bmw") 
        {
            cout << endl << "Marka samochodu: " << mark << endl;
            cout << "Model smaochod: " << model << endl;
            cout << "Rocznik samochodu: " << age << endl;
            cout << "Przebieg smaochodu: " << mileage << endl;
        }

        else 
        {
            cout << "Nie rozpoznano" << endl;
        }
    
    
    }

};

int main() 
{   
    cout << endl;


    // Animal z1; // deklaorwanie obiektu tak jak np int z1
    // z1.addAnimal(); // wywolanie z klasy animal metody dodaj zwierze
    // z1.voice(); // wywolanie z klasy animal metody daj glos

    Car car1;
    car1.addCar();
    car1.printCar();
	
    cout << endl;
    return 0;
}
