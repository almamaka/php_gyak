<?php

    require "connection.php";

    $error = "";
    $success = "";

    if(isset($_POST["reg"])){

        $user = $_POST["user"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        if(empty($user) ||empty($email) || empty($pwd)){

            $error = "Minden mező kitöltése kötelező!";
        }
        else{

            $con = mysqli_connect(host,user,pwd,dbname);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "INSERT INTO adatok(user,email,pwd) VALUES('$user', '$email', sha1('$pwd'))";

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
<title>Notebook Shop - Regisztráció</title>
</head>
<body>

<div class="container">

    <div class="row justify-content-center">

        <form action="" method="post" class="form-group text-center p-5 rounded">

            <h4 class="text-danger mb-3"><?php  if(!empty($error)){echo $error;}  ?></h4>
            <h4 class="text-success mb-3"><?php  if(!empty($success)){echo $success;}  ?></h4>

            <h2>Regisztráció</h2>

            <label for="">Felhasználónév</label>
            <input type="text" name="user" class="form-control mb-3">

            <label for="">E-mail cím</label>
            <input type="text" name="email" class="form-control mb-3">

            <label for="">Jelszó</label>
            <input type="password" name="pwd" class="form-control mb-3">

            <button type="submit" name="reg" class="btn btn-primary form-control mb-3">Regisztráció</button>

            <a href="login.php">Van már fiókja? Jelentkezzen be!</a>
        </form>

    </div>

</div>

</body>
</html>