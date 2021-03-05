<?php

    require "connection.php";

    $error = "";
    $success = "";

    if(isset($_POST["reg"])){

        $username = $_POST["username"];
        $email = $_POST["email"];
        $pwd = trim(md5(sha1($_POST["pwd"])));     //trimmelve tároljuk el az md5-el lekódolt és sha1 lekódolt jelszót

        if(empty($username) || empty($email) || empty($pwd)){

            $error = "Minden mező kitöltése kötelező!";
        }
        //Ha nem megfelelő az email formátum
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $error = "Nem megfelelő email formátum!";
        }
        else{

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "INSERT INTO adatok(username,email,pwd) VALUES('$username', '$email', '$pwd')";

            mysqli_query($con, $sql);

            $success = "Sikeres regisztráció!";
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
<title>PHP 10.17 Regisztráció</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <form action="" method="post" class="form-group text-center p-5 rounded">

                <p class="text-danger mb-3"> <?php  if(!empty($error)){ echo $error; }  ?> </p>
                <p class="text-success mb-3"> <?php if(!empty($success)){ echo $success; }   ?> </p>

                <h3 class="mb-3">Regisztárció</h3>

                <label for="">Felhasználónév</label>
                <input type="text" name="username" class="form-control mb-3">

                <label for="">E-mail cím</label>
                <input type="text" name="email" class="form-control mb-3">

                <label for="">Jelszó</label>
                <input type="password" name="pwd" class="form-control mb-3">

                <button type="submit" name="reg" class="form-control mb-3 btn btn-primary">Regisztráció</button>

                <a href="login.php">Van már fiókod? Jelentkezz be!</a>

            </form>
        </div>
    </div>

</body>
</html>