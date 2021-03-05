<?php

  


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<title>PHP Webshop Bejelentkezés/Regisztráció</title>
</head>
<body>

    <div class="container">

        <div class="row justify-content-center">
            <form action="" method="post" class="form-group text-center p-5 rounded">

                <p class="text-danger mb-3"><?php  if(!empty($error)){ echo $error; }  ?></p>
                <p class="text-success mb-3"><?php  if(!empty($success)){ echo $success; }  ?></p>

                <label for="">Felhasználónév</label>
                <input type="text" name="user" class="form-control mb-3">

                <label for="">E-mail cím</label>
                <input type="email" name="email" class="form-control mb-3">

                <label for="">Jelszó</label>
                <input type="password" name="pwd" class="form-control mb-3">

                <button type="submit" name="login" class="btn btn-success">Bejelentkezés</button>
                <button type="submit" name="reg" class="btn btn-primary">Regisztráció</button>
                <br><br>

                <a  href="reset.php">Elfelejtette a jelszavát?</a>

                <div class="mt-5 text-left">
                    <ul>
                        A jelszónak tartalmaznia kell legalább egy:
                        <li>a-z (kisbetűt)</li>
                        <li>A-Z (nagybetűt)</li>
                        <li>0-9 (számot)</li>
                        <li>speciális karaktert  -  @#-_$%?!&+</li>
                    </ul>
                </div>


            </form>
        </div>

    </div>

</body>
</html>