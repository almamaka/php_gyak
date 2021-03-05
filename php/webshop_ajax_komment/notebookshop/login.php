<?php

    require "connection.php";

    session_start();

    //Ezzel a változóval fogjuk ellenőrizni, hogy megtörtént-e a bejelentkzés (true) vagy nem (false).
    $_SESSION["logged"] = false;

    $error = "";
    $success = "";

    if(isset($_POST["login"])){

        $user = $_POST["user"];
        $pwd = $_POST["pwd"];

        if(empty($user) || empty($pwd)){

            $error = "Minden mező kitöltése kötelező!";
        }
        else{

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "SELECT * FROM adatok WHERE user='$user' AND pwd=sha1('$pwd')";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) == 1){

                $_SESSION["logged"] = true;
                $_SESSION["user"] = $user;
                header("Location: index.php");
            }
            else{

                $error = "Nincsenek ilyen belépési adatok!";
            }

        }
    }



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
<title>Notebookshop - Bejelentkezés</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <form action="" method="post" class="form-group text-center p-5 rounded">

                <h4 class="text-danger mb-3"><?php   if(!empty($error)){echo $error;}  ?></h4>

                <h2>Bejelentkezés</h2>

                <label for="">Felhasználónév</label>
                <input type="text" name="user" class="form-control mb-3">

                <label for="">Jelszó</label>
                <input type="password" name="pwd" class="form-control mb-3">

                <button type="submit" name="login" class="form-control mb-3 btn btn-success">Bejelentkezés</button>

                <a href="reg.php">Nincs még fiókja? Regisztráljon!</a>

            </form>
        </div>
    </div>

</body>
</html>