function jest_cyfra(x) // Sa juz gotowe w js funkcje ale chodzi o nauke :)
{
    var d = x.length; // funkcja jest uniwerslana - przeszczepialna do innego kodu
    for (i = 0; i < d; i++)
    {
        // POMYSL DZIALA ALE ZBYT DLUGI if (x.charAt(i) == "0" || x.charAt(i) == "1" || x.charAt(i) == "2" || x.charAt(i) == "3" || x.charAt(i) == "4" || x.charAt(i) == "5" || x.charAt(i) == "6" || x.charAt(i) == "7" || x.charAt(i) == "8" || x.charAt(i) == "9")  
        
        if (x.charCodeAt(i) >= 48 && x.charCodeAt(i) <= 57) // dostatnie sie do tablicy codu ascii a tam liczby sa od 48 do 57
        return true;
    }

    return false;

}

function weryfikuj()
{
    var haslo = document.getElementById("haslo").value;

    var d = haslo.length;

    if (haslo == "")
    document.getElementById("wynik").innerHTML = '<span style="color:red;">HASLO JEST PUSTE</span>';
    
    else if(d >= 7 && jest_cyfra(haslo))
    {
    document.getElementById("wynik").innerHTML = '<span style="color:green;">HASLO JEST DOBRE</span>';
    }

    else if(d >= 4 && d <= 6 && jest_cyfra(haslo))
    {
    document.getElementById("wynik").innerHTML = '<span style="color:blue;">HASLO JEST ŚREDNIE</span>';
    }

    else
    {
    document.getElementById("wynik").innerHTML = '<span style="color:yellow;">HASLO JEST SŁABE</span>';
    }
}
