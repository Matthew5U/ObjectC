<?php

// Tablice asocjacyjne - opisywane przz nasz podany klucz

$article = [
            'id' => 1, 
            'title' => 'Wprowadzenie do PHP', 
            'author' => 'Strefa kursow'
           ];

$article['category'] = 'Dodanie do tablicy asocjacyjnej';
$article['new'] = 'NEW';

print_r($article);

echo $article['title'];
