<?php

// Kontroler

// Do kogo przesylamy mail
$to = 'kurs@strefakursow.pl'; 

// Temat wiadomosci
$subj = "Nowy kontakt";

// Wyswietlenie bledu
//Poczatek
$error_start = "<p class='alert alert-error'>";
//Koniec
$error_end = "</p>";

// Zmienna zwracajaca prawde, formularz zostal dobrze zwalidowany
$valid_form = TRUE;

// Przekierowanie
$redirect = "success.php";

// Pola naszego formularza
$form_fields = array('name','phone','email','message');

// Pola wymagane
$required = array('name','phone','email');

// Przejscie przez kazde pole i przypisanie bledu pusty znak
foreach($required as $require){
    $error[$require] = '';
}

// Czy formularz zostal przeslany
if(isset($_POST['submit'])){
    
    /* pobieranie danych */
    // Inicjalizujemy wszystkie pola
    foreach($form_fields as $field){
        $form[$field] = htmlspecialchars($_POST[$field]); // Pobieranie danych
    }
    
    if($form['name'] == ''){ // Jesli pole jest puste
        $error['name'] = $error_start . "Wypełnij wymagane pole" . $error_end; // Wygeneruj blad
        $valid_form = FALSE; // Zwroc wartosc false dla validacji formularza 
    }
    
    if($form['phone'] == ''){
        $error['phone'] = $error_start . "Wypełnij wymagane pole" . $error_end;
        $valid_form = FALSE;
    }
    
    if($form['email'] == ''){
        $error['email'] = $error_start . "Wypełnij wymagane pole" . $error_end;
        $valid_form = FALSE;
    }
    
    //Sprawdzenie poprawnosci wprowadzonego email
    // preg_match -dopasowywanie  do wzorca
    if($error['email'] == '' && !preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $form['email'])){
         $error['email'] = $error_start . "Wprowadź prawidłowy email" . $error_end;
         $valid_form = FALSE;
    }

    if($error['phone'] == '' && !preg_match('^\+48[0-9]{9}$^', $form['phone'])){
         $error['phone'] = $error_start . "Wprowadź prawidłowy numer telefonu" . $error_end;
         $valid_form = FALSE;
    }
    
    //Przesylamy formularz jesli przyjmie wartosc true
    if($valid_form){
        
        //pierwsze pole wprowadzone przez uzytkownika
        $message = "Imię: " . $form['name'] . "\n";

        //Dolaczamy przez kropke nastepne pole
        $message .= "Telefon: " . $form['phone'] . "\n";
        $message .= "Email: " . $form['email'] . "\n";
        $message .= "Wiadomość: " . $form['message'];
        
        //Naglowek naszej wiadomosci
        // Od kogo
        $headers = "From: www.strefakursow.pl <admin@strefakursow.pl>\r\n";
        
        //Dolaczamy druga czesc naglowka
        $headers .= "X-Sender: <admin@strefakursow.pl>";
        
        //Adres docelowy, temat wiadomosci, tres, naglowek maila
        mail($to, $subj, $message, $headers);
        
        // Przekierowanie do suces.php
        header("Location: " . $redirect);
    } else { // Wyswietlenie widoku formularza
        include('form.php');
    }
    
} else {
    //Wyswietlamy wszystkie pola
    foreach($form_fields as $field){
        $form[$field] = '';
    }
    
    include('form.php');
    
}
