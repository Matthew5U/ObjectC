
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










