<?php

    if(isset($_POST["send"])){

        $username = $_POST["username"];

        //Cookie beállítása - cookie neve, mit tároljon el, meddig tárolja
        setcookie("username", $username, time() + 3600);

        header("Location: page2.php");
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
        <input type="text" name="username" placeholder="Írd be a felhasználóneved...">
        <button type="submit" name="send">Küldés</button>
    </form>
</body>
</html>