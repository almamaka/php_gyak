<?php

    session_start();
    

    if(isset($_POST["kuldes"])){

        $nev = $_SESSION["nev"] = $_POST["nev"];
        $email = $_SESSION["email"] = $_POST["email"];
        $uzenet = $_SESSION["uzenet"] =  $_POST["uzenet"];

        if(empty($nev) || empty($email) || empty($uzenet)){

            echo "<p style='color: red;'>Minden mező kitöltése kötelező!</p>";
        }
        else{

            header("Location: process.php");
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Név</label> <br>
        <input type="text" name="nev"> <br>

        <label for="">E-mail cím</label> <br>
        <input type="text" name="email"> <br>

        <label for="">Üzenet</label> <br>
        <textarea name="uzenet" id="" cols="30" rows="10"></textarea> <br>

        <button type="submit" name="kuldes">Küldés</button>

    </form>
</body>
</html>