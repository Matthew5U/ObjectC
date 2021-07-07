function zmienZawartosc()
{
    // Dostan sie do elementu o okreslonym id
    // Wewnetrzna zawartosc html
    document.getElementById("overview").innerHTML = "<h1>"+"Kurs Ajax"+"</h1>";

    // Element okreslony znacznikiem
    // Wszystkie elementy h3
    // W [] <- wpisujemy numer elementu h3 ktory wystepuje w hierarchi na stronie
    document.getElementsByTagName("h3")[1].innerHTML = "Kurs Ajax";
}

window.onload = function()
{
    zmienZawartosc(); // Uruchamiamy nasza funkcje
}



//Przyklad uzycia Ajax
window.onload = pokazListe;

function pokazListe()
{
    var zapytanie = ""; // Zmienna zapytanie
    zapytanie = new XMLHttpRequest(); // Przypisujemy obiekt zapytania. Jest to konstruktor
    
    // Gdy zmieni sie stan naszego zadania to tworzymy anonimowa funkcje
    // Funkcja sprawdzic stan oraz status zadania
    // Jesli bedzie prawidlowy to wtedy zawartosc pobrana z serwera umiesci w elemencie div
    // ktory ma unikalne id lista kursow
    zapytanie.onreadstatechange = function() // obsluga zdarzenia
    {
        if(zapytanie.readyState == 4 && zapytania.status == 200) // status 200 to znaczy ze wszystko ok
        {
            document.getElementById("listakursow").innerHTML = zapytanie.responseText; // Zawartosc tekstowa naszego zadania
            // ciag znakow zwrcony przez nasze zadanie wprowadzimy do diva o id listakursow
        }
        else
        {
            document.getElementById("listakursow").innerHTML = zapytanie.status+" "+zapytanie.statusText; 
            // odwolanie do tego smaego elementu div i sprawdzamy status bledu i nazwe
        }
    }

    zapytanie .open("GET", "kursy.xml", true); 
    // 1.parametr = metoda, 2. Nazwa pliku xml, 3. Zadanie asyn czy synchroniczne (true oznacza dzialanie w tle)
    zapytanie.send();

};

//Zawartosc XML
window.onload = pokazListe;

function pokazListe()
{
    var zapytanie = ""; // Zmienna zapytanie
    zapytanie = new XMLHttpRequest(); // Przypisujemy obiekt zapytania. Jest to konstruktor
    
    // Gdy zmieni sie stan naszego zadania to tworzymy anonimowa funkcje
    // Funkcja sprawdzic stan oraz status zadania
    // Jesli bedzie prawidlowy to wtedy zawartosc pobrana z serwera umiesci w elemencie div
    // ktory ma unikalne id lista kursow
    zapytanie.onreadstatechange = function() // obsluga zdarzenia
    {
        if(zapytanie.readyState == 4 && zapytania.status == 200) // status 200 to znaczy ze wszystko ok
        {
            var dokumentXml = zapytanie.responseXML;//zmienna przechowywyujaca xml naszego zpaytania
            var zawartosc = "";// bedziemy wprowadzac do id listakursow
            var x = dokumentXml.getElementsByTagName("tytul"); // PRzechowuje zbior wszystkich tytulow(tagi w pliku) umieszczonych w pliku xml
            for(i = 0; i < x.length; i++)
            {
                zawartosc += x[i].childNodes[0].nodeValue+"<br>"; 
                // Wezly podrzedne czyli [0]= pierwszy, i wartosc tego wezla. Wypiszemy zawratosc 
            }
            document.getElementById("listakursow").innerHTML = zawartosc;
        }
        else
        {
            document.getElementById("listakursow").innerHTML = zapytanie.status+" "+zapytanie.statusText; 
            // odwolanie do tego smaego elementu div i sprawdzamy status bledu i nazwe
        }
    }

    zapytanie .open("GET", "kursy.xml", true); 
    // 1.parametr = metoda, 2. Nazwa pliku xml, 3. Zadanie asyn czy synchroniczne (true oznacza dzialanie w tle)
    zapytanie.send();

};

// Obrobka odpowiedzi
window.onload = pokazListe;

function pokazListe()
{
    var zapytanie = ""; // Zmienna zapytanie
    zapytanie = new XMLHttpRequest(); // Przypisujemy obiekt zapytania. Jest to konstruktor
    
    // Gdy zmieni sie stan naszego zadania to tworzymy anonimowa funkcje
    // Funkcja sprawdzic stan oraz status zadania
    // Jesli bedzie prawidlowy to wtedy zawartosc pobrana z serwera umiesci w elemencie div
    // ktory ma unikalne id lista kursow
    zapytanie.onreadstatechange = function() // obsluga zdarzenia
    {
        if(zapytanie.readyState == 4 && zapytania.status == 200) // status 200 to znaczy ze wszystko ok
        {
           var dokumentXml = zapytanie.responseXML; // odwolanie do pliku na serwerze
           var zawartosc = "<ul>"; // otwiera nasza liste
           var tytuly = dokumentXml.getElementsByTagName("tytul"); // odwolanie do tytulow w pliku xml
            for(i=0; i < tytuly.length; i++)
            {
                // Modyfikuje zmienna zawartosc
                // Dodajemy do nie jest poszczegolne elementy ze zbioru tytulow
                zawartosc += "<li>"+tytuly[i].childNodes[0].nodeValue; //Znacznik pozycji na liscie
                //odwolanie do elementu html
                document.getElementById("listakursow").innerHTML = zawartosc+"</ul>";
            }
        }
        else
        {
            document.getElementById("listakursow").innerHTML = zapytanie.status+" "+zapytanie.statusText; 
            // odwolanie do tego smaego elementu div i sprawdzamy status bledu i nazwe
        }
    }

    zapytanie .open("GET", "kursy.xml", true); 
    // 1.parametr = metoda, 2. Nazwa pliku xml, 3. Zadanie asyn czy synchroniczne (true oznacza dzialanie w tle)
    zapytanie.send();

};

//Funkcja Ajax

window.onload = function()
{
    // Dodanie dwoch plikow do dwoch roznych elementow w html
    utworzZapytanie("kursy.xml", "listakursow"); // div ktory ma klase listakursow
    utworzZapytanie("kategorie.xml", "listakategorie"); // div ktory ma klase listakursow
}

function utworzZapytanie(url, div) // dwa parametry
// url - nazwa pliku
// div - przekazmy identyfikator div do ktorego chcemy wprowadzic zawartosc pliku jako pierwszy parametr
{
    var zapytanie = "";
    zapytanie = new XMLHttpRequest(); //Zadanie xml
    zapytanie.onreadstatechange = function()// gdy zmieni sie stan zapytania
    {
        if(zapytanie.readyState == 4 && zapytanie.status == 200)
        {
            // parametr przy wywolaniu naszej funkcji
            document.getElementById(div).innerHTML = zapytanie.responseText;
        }
        else
        {
            document.getElementById(div).innerHTML = zapytanie.status;
        }
    }
    zapytanie.open("GET", url, true);
    zapytanie.send();
}

/*
window.onload = pokazListe;

function pokazListe()
{
    var zapytanie = ""; // Zmienna zapytanie
    zapytanie = new XMLHttpRequest(); // Przypisujemy obiekt zapytania. Jest to konstruktor
    
    // Gdy zmieni sie stan naszego zadania to tworzymy anonimowa funkcje
    // Funkcja sprawdzic stan oraz status zadania
    // Jesli bedzie prawidlowy to wtedy zawartosc pobrana z serwera umiesci w elemencie div
    // ktory ma unikalne id lista kursow
    zapytanie.onreadstatechange = function() // obsluga zdarzenia
    {
        if(zapytanie.readyState == 4 && zapytania.status == 200) // status 200 to znaczy ze wszystko ok
        {
            document.getElementById("listakategorie").innerHTML = zapytanie.responseText;
        }
        else
        {
            document.getElementById("listakategorie").innerHTML = zapytanie.status+" "+zapytanie.statusText; 
            // odwolanie do tego smaego elementu div i sprawdzamy status bledu i nazwe
        }
    }

    zapytanie .open("GET", "kategorie.xml", true); 
    // 1.parametr = metoda, 2. Nazwa pliku xml, 3. Zadanie asyn czy synchroniczne (true oznacza dzialanie w tle)
    zapytanie.send();

};
*/



//Podstawy Ajax z php
window.onload = pokazListe;

function pokazListe() 
{
    var zapytanie = "";
    zapytanie = new XMLHttpRequest(); //Zadanie xml
    zapytanie.onreadstatechange = function()// gdy zmieni sie stan zapytania
    {
        if(zapytanie.readyState == 4 && zapytanie.status == 200)
        {
            // parametr przy wywolaniu naszej funkcji
            document.getElementById("listakursow").innerHTML = zapytanie.responseText;
        }
        else
        {
            document.getElementById("listakursow").innerHTML = zapytanie.status+" "+zapytanie.statusText;
        }
    }
    zapytanie.open("GET", "kursy.php", true);
    zapytanie.send();
}


// Walidacja zadanie
window.onload = inicjalizuj;
function inicjalizuj()
{
    document.getElementById("wyslij").disabled = true; // Wylacz przycisk
    document.getElementById("email").onblur = fnction()
    {
        sprawdzFormularz();
    }
};

function sprawdzFormularz()
{
    var zapytanie = "";
    zapytanie = new XMLHttpRequest();
    var email = document.getElementById("email").value;
    var url = "form.php?email=" + email;
    zapytanie.onreadystatechange = function()
    {
        if(zapytanie.readyState == 4 && zapytanie.status == 200)
        {
            if(zapytanie.responseText == "Uzupelnij email")
            {
                alert("Uzupelnij pole email");
            }
            else
            {
                document.getElementById("Wyslij").disabled = false; // Wlaczamy przycisk
            }
        }
    }
    zapytanie.open("GET", url, true);
    zapytanie.send();
};

// Metoda GET
window.onload = function()
{
    document.getElementById("Wyslij").onclick = function()
    {
        sprawdzFormularz();
    }
}

function sprawdzFormularz()
{
    zadanie = ""; // Zmienna globalna
    zadanie = new XMLHttpRequest(); 
    var poleEmail = document.getElementById("email").value; // zmienna lokalna
    var poleImie = document.getElementById("name").value;
    var url = "form.php?email=" + poleEmail + "&name=" + poleImie;
    zadanie.onreadystatechange = rejestracjaZakonczona;
    zadanie.open("GET", url, true);
    zadanie.send();
}

function rejestracjaZakonczona()
{
    if(zadanie.readyState == 4 && zadanie.status == 200)
    {
        document.getElementById("newsletter").innerHTML = zadanie.responseText;
    }
}


// Metoda POST
window.onload = function()
{
    document.getElementById("Wyslij").onclick = function()
    {
        sprawdzFormularz();
    }
}

function sprawdzFormularz()
{
    zadanie = ""; // Zmienna globalna
    zadanie = new XMLHttpRequest(); 
    var poleEmail = document.getElementById("email").value; // zmienna lokalna
    var poleImie = document.getElementById("name").value;
    var zawartosc = "email=" + poleEmail + "&name=" + poleImie;
    var url = "form.php"; // Bo metoda post wiec do pliku php
    zadanie.onreadystatechange = rejestracjaZakonczona;
    zadanie.open("POST", url, true);
    zadanie.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Naglowek zadania, serwer wie z jakim typem ma doczynienia 
    zadanie.send(zawartosc); // Przesylamy zmienna zawartosc 
}

function rejestracjaZakonczona()
{
    if(zadanie.readyState == 4 && zadanie.status == 200)
    {
        document.getElementById("newsletter").innerHTML = zadanie.responseText;
    }
}



// JSON - wstep
window.onload = pokazObiekt;

function pokazObiekt()
{
    var zawartosc = {
        //"tytul":"Kurs C++", 
        //"cena":"49.00", 
        //"kategoria":"Programowanie"
        "kursy":{
            "tytul":"Kurs c++",
            "nosnik":"DVD"
        },// podrzedne wlasciwosci
        "ksiazki":{
            "tytul":"Kurs Joomla",
            "strony":"346"
        }
    }; // Pierwsza wlasciwosc to nazwa i wartosc
    var obiekt = eval(zawartosc) // Przekonwertowanie wartosic na obiekt
    alert(obiekt.kursy.tytul); 
    // obiekt = to zbior wlasciwosci
    // obiekt.tytul = to wartosc pierwszej wlasciwosci
}


// Wymiana danych z serwerem
window.onload = wyslijZadanie;

function wyslijZadanie()
{
    zadanie = "";
    zadanie = new XMLHttpRequest();
    zadanie.onreadystatechange = pokazZawartosc;
    zadanie.open("GET", "dane.TXT", true);
    zadanie.send();
}

function pokazZawartosc()
{
    if(zadanie.readyState == 4 && zadanie.status == 200)
    {
        var zawartosc = "("+zadanie.responseText+")" // Uycie funkcji eval 
        var obiekt = eval(zawartosc);
        var text = "Tytul: "+ obiekt.tytul + "\n";
        text +=  "Cena: " + obiekt.cena + "\n";
        text += "Kategoria: " + obiekt.kategoria + "\n";
        alert(text); // wysietlenie wszystkich wartosci
    }
}


// XML - struktura dokumentu
window.onload = wyslijZadanie;

function wyslijZadanie(){
	zadanie = "";
	zadanie = new XMLHttpRequest();
	zadanie.onreadystatechange = pokazZawartosc;
	zadanie.open("GET", "kursy.xml", true);
	zadanie.send();
}

function pokazZawartosc(){
	if(zadanie.readyState == 4)
	{
		if(zadanie.status == 200)
		{
			var div = document.getElementById("listakursow");
			var zawartosc = zadanie.responseXML.documentElement.firstChild.nextSibling.firstChild.nextSibling.firstChild.nodeValue;
            // Pierwszy element podrzedny + odwolanie do jeggo zawartosci
            // firstChild - pierwszy wezel podrzedny(bialy znak)
            // nextSibling - wezel sasiedni na tym samym etapie(wezel kurs na tym samym poziomie co znak bialy)
            
            div.innerHTML = zawartosc;
		}
		else
		{
			div.innerHTML = "Błąd żądania: " + zadanie.status;
		}
	}
}


// Odwolania do wezlow
window.onload = wyslijZadanie;

function wyslijZadanie(){
	zadanie = "";
	zadanie = new XMLHttpRequest();
	zadanie.onreadystatechange = pokazZawartosc;
	zadanie.open("GET", "kursy.xml", true);
	zadanie.send();
}

function pokazZawartosc(){
	if(zadanie.readyState == 4)
	{
		if(zadanie.status == 200)
		{
			var div = document.getElementById("listakursow");
			var zawartosc = zadanie.responseXML.documentElement.firstchild.nextSibling.firstChild.nodeValue;
            if(zawartosc.firstChild.nodeType == 1) // Sprawdzamy typ wezla. 1- wezel znacznika wystepuje tylko w ie
            {
                zawartosc = zawartosc.firstChild.firstChild.nodeValue; // odwolanie dla ie.  Wyswetlamy wartosc wezla
            }
            else if(zawartosc.firstChild.nodeType == 3) // Typ wezla podzednego czyli mamy doczynienia z firefox
            {
                zawartosc = zawartosc.fistChild.nextSibling.firstChild.nodeValue;
            }
            div.innerHTML = zawartosc;
		}
		else
		{
			div.innerHTML = "Błąd żądania: " + zadanie.status;
		}
	}
}


// Jquery
$(document).ready(function()
{
    alert("Kurs AJAX");
})

//Zadania z jQuery

var url = "kursy.html";
$(document).ready(function()
{
    //$("#listakursow").load(url + " #biurowe"); // ladujemy id biurowe z pliku html
    $("#listakursow").load(url, function()
    {
        alert("Zadanie zakonczone");
    });
});


// jQuery - metoda GET
$(document).ready(function()
{
    $("#wyslij").click(function()
    {
        var url = "form.php"; // adrs naszego dokumentu obslug skryptu
        var email = $("#email").val();
        var imie = $("#name").val();
        url += "?email=" + email + "&name=" + imie;
        $("#newsletter").load(url);// ladujemy nasz wynik

    })
});


// jQuery - metoda Ajax
$(document).ready(function()
{
    // metoda ajax 
    $.ajax({url:"kursy.html", async: false, success: function(odpowiedz)
    {
        $("#listakursow").html(odpowiedz); // Modyfikujemy zawartosc html tego elelemntu
    }}); 
    // nazwa pliku gdzie chemy przeslac
});

//Obsluga bledow
$(document).ready(function()
{
    $("#listakursow").load("kursy.html"); // Wyswietlenie listy z kursy.html
    $("#listakursow").ajaxError(function (e, xhr) // obiekt zdarzenia, obiekt zadania
    {
        $(this).html("Blad: " + xhr.status + " " + xhr.statusText);
    }); // Blad zadania ajax
    //$.ajax({url:"kursy.html", error:function(blad)
    //{
    //    alert("Blad: "+ blad.status);//Komunikat o bledzie
    //                                 //status bledu naszego zadania
    //}});
});



// Praktyczny projekt
// zadanie ajax
$(document).ready(function()
{
    $("#dodaj").click(function()
    {
        var tytul = escape($("#tytul").val()); // escape - usuwanie spacji
        var cena = escape($("#cena").val()); // escape - usuwanie spacji
        var kategoria = escape($("#kategoria").val()); // escape - usuwanie spacji
        var url = "form.php?tytul=" + tytul + "&cena=" + cena + "&kategoria=" + kategoria;
        $.get(url);

    });
});



// Kolejne zadanie
$(document).ready(function()
{
    $("#produkty").load("pokaz_kursy.php"); // Zawartosc bedzie wczytana po zaladowaniu strony
    $("#dodaj").click(function()
    {
        var tytul = escape($("#tytul").val()); // escape - usuwanie spacji
        var cena = escape($("#cena").val()); // escape - usuwanie spacji
        var kategoria = escape($("#kategoria").val()); // escape - usuwanie spacji
        var url = "form.php?tytul=" + tytul + "&cena=" + cena + "&kategoria=" + kategoria;
        $.get(url, function()
        {
            $("#produkty").load("pokaz_kursy.php"); // Zaktualizowana zawartosc tabeli
            
        });

    });
});

//Formatowanie tabel
