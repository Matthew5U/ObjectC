
/* 
//Alert
$(document).ready(function() {
    alert("KURS JS");
});



// Funkcja anonimowa
$(function() 
{
    alert("Hi");
});

//Funkcja zdefiniowana
function pokazOkno()
{
    alert("Kurs JS");
}

$(pokazOkno);



// Selektory
// Zwykly js
window.onload = function(){  // W momencie zaladowania strony
    document.getElementById("nav").innerHTML = "Kurs JS;" // Zdobadz element po przez id
    // Pobieramy element o id nav  i modyfikujemy  kod html
    
};

// Z uzyciem jQuery
$(document).ready(function()
{
    $("p").css("color", "red") // modyfikujemy selektory p
                               // modyfikujemy kolor tekstu na czerowny
});

// Zlozone selektory
$(document).ready(function()
{
    //$(".jeden").css("border-color", "red"); // klasa o nazwie jeden
    $("#nav li a").css("border-color", "red"); // zlozony selekotr 
                               
});



// Filtry
$(document).ready(function()
{
    $("a:eq(0)").css("color", "red"); // Dodanie filtru po przez pierwszy element tablicy
    $("a:gt(0)").css("color", "red"); // Od elementu formatuje
    $("a:lt(0)").css("color", "red"); // Do elementu formatuje
    $("a:even(0)").css("color", "red"); // Nieparzyste formatuje
    $("a:odd(0)").css("color", "red"); // Parzyste formatuje
    $("#nav li a:even(0)").css("color", "red"); // Ograniczamy dzialanie selektora


});
*/


// Wybieranie atrybutow
$(document).ready(function()
{
    $("p[class]").css("color", "green"); // Foramtujemy akapity (p) pod warunkiem ze posiadaja dowolna wartosc akapitu class
});



// Wyszukiwanie
$(document).ready(function()
{
    $("p:contains(kurs)").css("color", "green"); // Akapity zawierajace slowo kurs
});



// Hierarchia
$(document).ready(function()
{
    $("p:has(a)").css("color", "green"); // Formatujemy takie akapity ktore posiadaja wewnatrz odnosnika a
});



// Odczyt zawartosci
$(document).ready(function()
{
    alert($("p").html()); // Zawartosc html pierwszego akapitu
});



// Wstawianie elementow
$(document).ready(function()
{
    $("p").append("Kurs php"); // Dolaczanie do akapitu p krotki tekst
});



// Odczyt i modyfikacja atrybutow
$(document).ready(function()
{
    alert($("#opis1").attr("id")); // W wyskakujacym okienku wyswietlimy wartosc atrybutu id obiektu ktorego ma id= opis1

    $("a").attr("href", "http://strefakursow.pl"); // Kazdy odnosnik otrzyma atrybut href z wartosicia z adresu strony

    $("a:eq(1)").attr({ href: "http://strefakursow.pl", title: "Katalog", target: "_blank"}); //Dodajemy trzy rozne atrybty

    $("#opis1").removeAttr("title"); // Usuniecie atrybutu
});



// Odczyt i modyfikacja CSS
$(document).ready(function()
{
   alert($("#opis1").css("color")); // Wyswietlimy wartosc wlasciwosci kolor dla obiektu ktory ma uniklany id=opis1
});



// Przypisywanie klas CSS
$(document).ready(function()
{
    $("#opis1").addClass("highlight"); // Dodaje klase do konkretnego id

    $("div:eq(5)").removeClass("left"); // Usun klase z diva 6
});



//CSS - Edycja szerokosci i wysokosci
$(document).ready(function()
{
    alert($("img").height()); // Wysokosc obrazka
});



// Usuniecie zawartosci
$(document).ready(function()
{
    $("p").remove(); // Usuniecie akapitow
});  



// Zdarzenia podstawy
$(document).ready(function()
{
    /*
    $("p").click(function()
    {
        alert("Kliknieto");
    }); // Po kliknieciu zachodzi zdarzenie 
    */
   kliknij();
});  

function kliknij()
{
    $("p").click(function()
    {
        alert("kurs jQuery");
    })
}



// Zdarzenie MOUSEENTER
$(document).read(function()
{
    $("img").mouseenter(function()
    {
        $(this).attr("src", "img/2.jpg");
    })
    .mouseleave(function()
    {
        $(this).attr("src", "img/1.jpg");
    });
});

// Funkcja Bind
$(document).read(function()
{
    $("p").bind("click", function()
    {
        alert("Kurs");
    });  // Zdarzenie oraz obsluga tego zdarzenia
});



// Zdarzenia
$(document).read(function()
{
    $("#opis1").bind("click", function()
    {
        alert("Dziala");
    });
});



// Obiekt zdarznia
$(document).read(function()
{
    $("p").click(function(zdarzenie)
    {
        alert(zdarzenie.type); // Zwracamy typ zdarzenia
        alert(zdarzenie.target); // Element docelowy
        alert(zdarzenie.timeStamp); // Czas w ktorym wystapilo zdarzenie
        alert(zdarzenie.pageX); // Wspolrzedna naszego klikniecia w poziomie 
        alert(zdarzenie.pageY); // Wspolrzedna naszego klikniecia w pionie
        alert(zdarzenie.pageX+","+zdarzenie.pageY);  
    });
});



// Metoda Hover
$(document).read(function()
{
    $("#banner").hover(function() // Moment najechania
    {
        $(this).attr("src", "img/2.jpg");
    },
    function(){ // Wraca oryginalny obrazek
        $(this).attr("src", "img/1.jpd")
    }
    );
});



// Uzycie zdarzen
$(document).read(function()
{
    $("#obrazek").hover(function() // W momencie najechania na obrazek
    {
        var opisKursu = $("#obrazek").attr("title"); // Atrybut przypisalismy do zmiennej
        $("#opis").append("<p>"+opisKursu+"</p>"); // Wstawilismynasza zmienna do akapitu
    },
    function(){
        $("#opis p").hide(); // Ukryj akapit
    });
});
*/



// Wyglad formularza
$(document).read(function()
{
    $("form :input").css("border", "2px solid #777"); // Modyfikujemy input po przez zapisc form :input
    $("form :submit").css("border", "2px solid #777"); // Modyfikujemy submit po przez zapisc form :submit
    $("label").css("border", "2px solid #777"); // Modyfikujemy etykiety

    $("#biurowe").click(function()
    {
        alert("Kurs JQuery");
    });
});



// Zdarzenia formularza
$(document).read(function()
{
    $("#name").focus(function(zdarzenie) // Skupienie na elemencie
    {
        alert(zdarzenie.type);
    });

    $("#name").blur(function(zdarzenie) // Wychodzimy z pola imie i pojawia sie blur
    {
        alert(zdarzenie.type);
    });

    $("form").submit(function(zdarzenie) // Zatwierdzenie formularza
    {
        alert(zdarzenie.type);
    });

});



// Walidacja formularza
$(document).read(function()
{
    $("#newsletter").submit(function()
    {
        if(($("#name").val() == "") || ($("#email").val() == ""))// Sprawdzamy wartosc w polu name i w polu email
        {
            alert("Uzupelnij wymagane pola");
            return false; // Zwrac false co przerwie wyslanie formularza
        }
    });

});  



// Pola typu checbox
$(document).read(function()
{
    $("#newsletter").submit(function()
    {
        
        //alert("Zaznaczono "+$(":checked").length+"kategorie"); // :checked - zbiro zazanczonych elementow
        //                                                       // Zapis ile zaznaczono checkboxow      
        
        if($(":checked").length == 0)
        {
            alert ("Zazancz co najmnije 1 kategorie");
            return false;
        }
    });

}); 



// Aktywne pola
$(document).read(function()
{
    $("input").focus(function()
    {
        $(this).css(
            {
                "border": "2px solid #29B6CF",
                "background": "#FFFEDD"
            });
        $("input").blur(function()
        {
            $(this).css(
                {
                    "border": "1px solid #DDD",
                    "background": "#F5F5F5"
                });
        });
    });

}); 



// Ukrywanie pol
$(document).read(function()
{
    $("#problem").click(function()
    {
        $("#description").toogle("slow"); // Przyjmuje predkosc animacji
    });

}); 



// Wartosci domyslne
$(document).read(function()
{
    $("#name1").bind("focus", function()
    {
        if($(this).val() == "Podaj swoje imie") // sprawdzamy czy wartosc jest to samo co wartosc domyslna tego inputa
        {
            $(this).val("");
        }
    });
    $("#name1").bind("blur", function()
    {
        if($(this).val() == "")
        {
            $(this).val("Podaj swoje imie");
        }
    });

}); 



// Modyfikacja wygladu
$(document).read(function()
{
    //$("tr:odd").css("background-color", "#01294F");
    $("tr").hover(function()
    {
        $(this).css("background-color", "#1294F");
    },
    function()
    {
        $(this).css("background-color", "#FFF");
    }
    );
});   



// Modyfikacja struktury tabeli
$(document).read(function()
{
    $("#lista tr:last").after("<tr><td>Kurs C#</td><td>49</td></tr>"); // Wstawianie komurek
    $("#lista tr:first").after("<tr><td colspan='2' class='kategoria'>Biurowe</td></tr>"); // Wstawianie komurek
    $("#lista tr:eq(4)").after("<tr><td colspan='2' class='kategoria'>Internet</td></tr>"); // Wstawianie komurek
    $("#lista tr:eq(7)").after("<tr><td colspan='2' class='kategoria'>Programowanie</td></tr>"); // Wstawianie komurek

});



// Wstep do animacji
$(document).read(function()
{
    $("#hide").click(function()
    {
        $("#lista").hide(); // Ukrycie listy czyli naszej tabeli
    });
    
    $("#show").click(function()
    {
        $("#lista").show(); // Pokaz tabele
    });

    $("#toggle").click(function()
    {
        $("#lista").toggle(); // Zmienia stan widocznosci naszej tabeli. show lub hide
    });
});



// Parametry animacji
$(document).read(function()
{
    $("#hide").click(function()
    {
        $("#lista").hide(2000, function() // Szybka animacja
                        //"slow"
                        //500 - Czas w milisekunadach
                        //2000 - 2000ms
        {
            alert("Animacja skonczona");
        });
    });
});



// Animacja fade
$(document).read(function()
{
    $("#hide").click(function()
    {
        $("#lista").fadeOut(2000, function() // Zanikanie. () - zniknie domyslnei. (2000) - zaniknie po 2s
        {
            alert("Animacja zakonczona");
        });
    });
    $("#show").click(function()
    {
        $("#lista").fadeIn(2000); // Pojawianie sie. 
    });
    $("#show").click(function()
    {
        $("#lista").fadeTo(2000, .5); // Docelowy poziom przezroczystosci od 0 do 1 
    });

});



// Animacja slide
$(document).read(function()
{
    $("#hide").click(function()
    {
        $("#banner").slideUp(); // Zwijanie do gornego lewego kata
    });
    $("#show").click(function()
    {
        $("#banner").slideDown(); // Rozwijanie w dol
    });
    $("#toogle").click(function()
    {
        $("#banner").slideToggle(); // Przelacz zwijanie i rozwijanie
    });
});



// Laczenie animacji
$(document).read(function()
{
    $("#hide").click(function()
    {
        // Zajescie animacji jedna po drugie az sie skonczy jedna to druga sie zacznie
        $("#banner").hide(); // Ukrwanie
        $("#banner").slideDown(2500); // Rozwijanie 
        $("#banner").slideUp(2500); // Zwijanie 

        // Alternatywa
        $("#banner").hide().slideDown(2500).slideUp(2500);

        $("#banner").hide().slideDown(2500).delay(3000).slideUp(2500); // delay - opuznienie

    });
});



// Tworzenie wlasnej animacji
$(document).read(function()
{
    $("#an2").click(function()
    {
        $("#akapit").animate({fontSize: "20px", width: "150px"}, 2000);  // W css fontSize a w animacji fontSize // Rozmiar docelowy 20px // Dlugosc animacji
        
    });
    $("#anl").click(function()
    {
        $("#obrazek").animate({opacity: "0"}, 2000);
    })
});



// Animacja pozycji
$(document).read(function()
{
    //$("#container").css("left", "+100px"); // Przesuniecie obrazka o 100px
    $("$right").click(function()
    {
        $("#container").animate({left: "+=100px"}); // W stosunku do polozenia poprzedniego w prawo
    });
    $("left").click(function()
    {
        $("#container").animate({left: "-=100px"});
    });
});



// Roziwjana zawartosc
$(document).read(function()
{
    $("p").hide();
    $("#h2").click(function()
    {
        $(this).next("p").toggle(); // Przelaczamy akapit ktore sa tuz pod naglowkiem h2
    
    });
    
    $("#zwin").click(function()
    {
        $("p").hide();
    });

    $("#rozwin").click(function()
    {
        $("p").show();
    });
});



// Powiekszanie obrazkow
$(document).read(function()
{
    $("#okladkamala").hover(function()
    {
        //$("#okladkaduza").show();
        var pozycja = $("#okladkamala").offset(); // offset to wymiary odsuniecia elementu od lewej i prawej
        $("#okladkaduza").css("left", pozycja.left+76).css("top", pozycja.top+68).css("display", "block").show();
        // Wyswietlimy nasza okladke mala jako duza po najechaniu
    },
    function()
    {
        $("#okladkaduza").hide();
    }
    );
});




// Rozwijane artykuly
$(document).read(function()
{
    $(".rozwiniecie").hide();
    $(".rozwiniecie").after("<h4 class='pokaz'>"+"Rozwin"+"</p>");
    $(".pokaz").click(function()
    {
        $(this).prev("p").toggle(); // Poprzedni akapit
        if($(this).text() == "Rozwin")
        {
            $(this).text("Zwin"); // Wprowadzamy slowo zwin
        }
        else
        {
            $(this).text("Rozwin"); // Przywaracamy wartosc 
        }
    });
});



// Ukrywanie zawartosci
$(document).read(function()
{
    $(".wstep").append("<h4 class='usun'>"+Usun+"</h4>");
    $(".usun").click(function()
    {
        $(this).parents(".artykul").hide(600, function()
        {
            $(this).parents(".artykul").remove(); // Usuwanie akapitu
        });
    });
});



// Wysuwanie elementow
$(document).read(function()
{   
    $("#slider").hover(function()
    {
        $(this).animate({left: "0px"});
    },
    function()
    {
        $(this).animate({left: "-292px"})
    }
    );
});



// Rozwijane menu
$(document).read(function()
{
    $("ul#menu li").hover(function()
    {
        $(this).find(".podmenu").slideDown(); // Wybieramy podmenu
    },
    function()
    {   
        $(this).find(".podmenu").slideUp();
    });
});



// Harmonijka
$(document).read(function()
{
    //$("#harm p:not(:first)").hide(); // Ukryjemy wszystkie akapity z wyjatkiem peirwszego
    $("#harm p:eq(3)").show(); 
    
    $("#harm h2").click(function()
    {
        $(this).next("p").slideToggle().sibling("p:visible").slideUp(); // sibling - rodzenstwo. Rozwiniety moze byc tylko jedne akapit
    });
});



// Tresc podzielona na karty
$(document).read(function()
{
    $("a.zakladki").click(function()
    {
        $(".aktywna").removeClass("aktywna");
        $(this).addClass("aktywna");
        $(".zawartosc").hide();
        var otwartaZakladka = $(this).attr("title");
        $("#"+otwartaZakladka).show(); // Selektor bazujacy na id
    });
});


//////////////////////////////JQUERY UI /////////////////////////////////////////////
// instalacja jquery
$(document).read(function()
{
    $("#logo").dialog(); // Okienko z komunikatem
});



// Skalowanie elemenow jQuery
$(document).read(function()
{
    $("#banner").resizable({/*maxWidth: 600*/ handles: "n, e, s, w"}); // Zmiana rozmiaru obrazka // rozmiar w kazda strone

});



// Przeciaganie zawartosci strony 
$(document).read(function()
{
    $("p:eq(1)").draggable({axis: "x"}); // Elementy przeciagalne // w plaszczyznie poziomej
    $("p:eq(1)").draggable({snap: "p"}); // Przeciaganie tylko do sasiednich akapitow

    $(".ukladanka").draggable({snap: "h2"}); // PRzyciaganie do naglowkow h2

});



// Sortowanie zawartosci listy
$(document).read(function()
{
    $("#sortowanie").sortable({revert: 1000}); // Metoda sortowania - sortable. revert - animacja na koncach listy
                             //opacity: 0.5 // Element przeciagany ma zmniejszone oppacity
                             //cursor: "pointer" // Kursor 
}); 



// Animacja kolorow
$(document).read(function()
{
    $(".animacjakoloru").hover(function()
    {   
        $(this).animate({"backgroundColor": "#001A34", "color": "#FFFFFF"}); // Zmiana tla i tekstu w jq ui 
    },
    function()
    {
        $(this).animate({"backgroundColor": "#072550", "color": "#71d4e7"}); 
    });
});



// Efekty z biblioteki UI
$(document).read(function()
{
    $(".btn:first").click(function()
    {
        $("#banner").hide("blind", 2000); // Zwiniecie obrazka
                        //"explode" // Rozszerzany obrazek
    });
});



// Okna dialogowe
$(document).read(function()
{
    $("#promocja").dialog({title: "Promocja", show: "slide", hide: "explode", position: "top", model: true}); // Efekt chowania i pokazywania okienka umieszczamy w "" 
                                                                                      //[300, 200] // od lewej 300 od gornej 200 
});


// Kalendarz
$(document).read(function()
{
    //$("#date").datepicker({dateFormat: "dd/mm/yy", duration: 2000}) // format daty, czas pojawiania sie kalendarza 
    $("#date").datepicker({dateFormat: "dd/mm/yy", showWeek: true}) // dni tygodnia 
    $("#date").datepicker({dateFormat: "dd/mm/yy", dayNamesMin: ["Nd", "Pn", "Wt", "Sr", "Cz", "Pt", "So"]}); // Nazwy dni tyodnia 

});



// Formatowanie jquery UI
$(document).read(function()
{
    $("#promocja").dialog({title: "Promocja", modal: true});
});



// Lightbox
$(document).read(function()
{
    $("#main a").lightbox();
});



// Slider 
$(document).read(function()
{
    $("#slider").nivoSlider({effect: "fade", paseTime: 2000, startSlide: 4}); 
    // Przejscie, czas ladowania slajdow, zaczecie od 5 obrazka
});




// Easing
$(document).read(function()
{
    $("#animacja").click(function()
    {
        $("#akapit").slideUp(4000, easeOutExpo); // Zwijanie akapitu. Czas, rodzaj zwijania
    });
});




// LavaLamp
$(document).read(function()
{
    $("#menu").lavaLamp({fx: "easeOutBounce", speed: 1000, returDelay: 2000 }); 
    // fx - efekt, speed - szybkosc, czas po ktorym zaznaczeni powroci do menu
});














