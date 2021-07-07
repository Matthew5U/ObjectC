<?php 

include('db_connect.php');

function createForm($p_name='',$p_category='',$error='',$id='') { ?>


    <!DOCTYPE html>
    <html>
        <head>
            <title><?php if($id != '') { echo "Edytuj rekord"; } else { echo "Dodaj rekord"; } ?></title>
            <meta charset="UTF-8" /> 
        </head>
        <body>
        
            <h1><?php if($id != '') { echo "Edytuj rekord"; } else { echo "Dodaj rekord"; } ?></h1>
            
            <?php if($error != '') {
                echo "<div style='color:red; padding: 5px'>" . $error . "</div>";
            } ?>
            
            <form action="" method="post">
                <div>
                    <?php if($id != '') { ?>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <p> ID: <?php echo $id; ?></p>
                    <?php } ?>
                    
                    <p><label>Nazwa: </label><input type="text" name="name" value="<?php echo $p_name; ?>" /></p>
                    <p><label>Kategoria: </label><input type="text" name="category" value="<?php echo $p_category; ?>" /></p>
                    <input type="submit" name="submit" value="Wyslij" />
                    
                </div>
            </form>
        
        </body>
    </html>

<?php }

if(isset($_GET['id'])){
    /* tryb edycji */
    if(isset($_POST['submit'])){
        
        if(is_numeric($_POST['id'])){ // Czy jest wartoscia numeryczna
            $id = $_POST['id']; //Wartosc pobrana z post
            $name = htmlentities($_POST['name'], ENT_QUOTES); // Zmienna name
            $category = htmlentities($_POST['category'], ENT_QUOTES); // Zmienna category
            
            if($name == '' || $category == ''){ // Sprawdzamy czy pola nie sa puste
                $error = 'Wypełnij wszystkie pola'; // Dodajemy do error
                createForm($name,$category,$error);
            } else {
                if($stmt = $mysqli->prepare("UPDATE products SET name = ?, category = ? WHERE id = ?")){ // aktualizacja. ?- parametr zapytania
                    $stmt->bind_param("ssi",$name,$category,$id); // podpinamy zapytanie
                    $stmt->execute(); // Wykonujemy zapytanie
                    $stmt->close(); // zamykamy zapytanie
                } else {
                    echo "Błąd zapytania";
                }
                
                header("Location: index.php");
            }
            
        }
        
    } else {
        if(is_numeric($_GET['id']) && $_GET['id'] > 0 ){
            
            $id = $_GET['id'];
            
            if($stmt = $mysqli->prepare("SELECT * FROM products WHERE id = ?")){
                $stmt->bind_param("i",$id);
                $stmt->execute();
                $stmt->bind_result($id,$name,$category);
                $stmt->fetch();
                createForm($name,$category,NULL,$id);
                $stmt->close();
            } else {
                echo "Błąd zapytania";
            }
            
        } else {
            header("Location: index.php");
        }
    }
    
} else {
    /*Tryb nowego rekordu*/
    
    if(isset($_POST['submit'])){
        
        $name = htmlentities($_POST['name'], ENT_QUOTES);
        $category = htmlentities($_POST['category'], ENT_QUOTES);
        
        if($name == '' || $category == ''){
            $error = 'Wypełnij wszystkie pola';
            createForm($name,$category,$error);
        } else {
            if($stmt = $mysqli->prepare("INSERT products (name,category) VALUES (?,?)")){
                $stmt->bind_param("ss",$name,$category);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Błąd zapytania";
            }
            
            header("Location: index.php");
        }
        
    } else {
        createForm();
    }
    
}

$mysqli->close();

?>
