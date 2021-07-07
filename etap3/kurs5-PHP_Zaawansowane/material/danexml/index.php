<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    </head>
    
<body>

    <?php
    
        $src = "produkty.xml"; //zmienna z plikiem
        $xml = simplexml_load_file($src); // Zaladuj nasz plik xml
        
        $limit = 3; // 3 pierwsze wezle(produkty)
        
        echo "<ul>";
        
        //Wyswietlenie zawartosci dokumentu xml
        foreach($xml->product as $product){ // Wyprowadzenie znacnzika o nazwie product 
            echo "<li><a href='$product->link'>$product->name</a></li>";// Wezel link, i wezel name
            $limit--;
            if($limit == 0) {break;}
        }
        
        echo "</ul>";
    
    ?>

</body>
     
</html>
