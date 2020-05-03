<?php
// Typowanie funckji

// Sprawdzanie typu dnaych

// Mozna zaznaczyc w jakim typie danych ma zworci wartosc

declare(strict_types=1); // Scisle kontrolowe z uzyciem 1


function sumNumbers( int $a, int $b )
{
    return $a + $b;
}

$x =sumNumbers(1,5);

echo $x . '<br>';

function displayTitle ( String $title)
{
    return $title;
}

echo displayTitle('Naglowek');






















?>