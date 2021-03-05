<?php

    session_start();

    require "class/reg.php";
    require "class/login.php";

    $error = "";
    $success = "";

    //Regisztráció
    if(isset($_POST["reg"])){

        $reg = new Reg();
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];

        try{

            $reg->registration($username,$pwd);
            $success = $reg->success;
        }
        catch(Exception $e){

            $error = $e->getMessage();
        }
    }

    //Bejelentkezés
    if(isset($_POST["login"])){

        $login = new Login();
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];

        try{

            $login->login($username,$pwd);
        }
        catch(Exception $e){

            $error = $e->getMessage();
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
<link rel="stylesheet" href="css/style.css">
<title>OOP - login</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <form action="" method="post" class="bg-dark text-light p-5 text-center form-group">

            <span class="text-success mb-3 d-block"><?php if(!empty($success)){echo $success;}  ?></span>
            <span class="text-danger mb-3 d-block"><?php if(!empty($error)){echo $error;}  ?></span>

            <label for="">Felhasználónév</label>
            <input type="text" name="username" id="username" class="form-control mb-3">

            <label for="">Jelszó</label>
            <input type="password" name="pwd" id="pwd" class="form-control mb-3">

            <button type="submit" name="login" id="login" class="btn btn-success">Bejelentkezés</button>
            <button type="submit" name="reg" id="reg" class="btn btn-primary">Regisztráció</button>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>