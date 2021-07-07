<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"> 
</head>

<body>

    <?php
    
        if(isset($_POST['email'])){ // Czy formularz zostal przeslany

            //Filtrujemy email
            $email_f = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            
            //Poprawnosc emial
            if(filter_var($email_f, FILTER_VALIDATE_EMAIL)){
                echo $email_f;
            } else {
                echo $email_f . " ma nieprawidłowy format";
            }
        }
    
    ?>

    <br>

    <form action="form.php" method="post">
        <p>Email: <input type="text" name="email" value=""/></p>
        <p><input type="submit" name="submit" value="Wyślij"/></p>
    </form>

</body>

</html>
