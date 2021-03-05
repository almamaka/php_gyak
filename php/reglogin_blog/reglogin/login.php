<?php

    require "connection.php";

    $error = "";

    if(isset($_POST["login"])){

        $username = $_POST["username"];
        $pwd = trim(md5(sha1($_POST["pwd"])));

        if(empty($username) || empty($pwd)){

            $error = "Minden mező kitöltése kötelező!";
        }
        else{

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "SELECT username,pwd FROM adatok WHERE username='$username' AND pwd='$pwd'";

            $result = mysqli_query($con, $sql);

            //Ha az SQL lekérdezés kimenetének van eredménye (van eltárolva az adatbázisan olyan user és jelszó amit én beírtam az input mezőkbe)
            if(mysqli_num_rows($result) == 1){

                //Akkor megtörténhet a bejelentkezés és továbbléphetünk a következő oldalra
                header("Location: http://www.google.hu");
            }
            //Ha nincs eredmény (nincs ilyen eltárolt adat amit beírtam az input mezőkbe)
            else{

                $error = "Nincs ilyen felhasználónév és jelszó páros az adatbázisban!";
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
<title>PHP 10.17 Bejelentkezés</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <form action="" method="post" class="form-group text-center p-5 rounded">

                <p class="text-danger mb-3"> <?php  if(!empty($error)){ echo $error; }  ?> </p>
               

                <h3 class="mb-3">Bejelentkezés</h3>

                <label for="">Felhasználónév</label>
                <input type="text" name="username" class="form-control mb-3">


                <label for="">Jelszó</label>
                <input type="password" name="pwd" class="form-control mb-3">

                <button type="submit" name="login" class="form-control mb-3 btn btn-success">Bejelentkezés</button>

                <a href="reg.php">Nincs még fiókod? Regisztrálj!</a>

            </form>
        </div>
    </div>

</body>
</html>