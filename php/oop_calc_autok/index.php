<?php

    require "class.php";

    if(isset($_POST["btn"])){

        $param = $_POST["param"];

        $teszt = new Teszt($param);
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
    <h2>Osztály paraméterének megadása input mezőből</h2>
    <form action="" method="post">
        <input type="text" name="param" placeholder="Ide írd be a paramétert...">

        <button type="submit" name="btn">Indítás</button>
    </form>
</body>
</html>