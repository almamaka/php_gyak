<?php

    setcookie("username", "Szabó Péter", time() + 3600);
    setcookie("pwd", "12345678", time() + 3600);

    if(isset($_POST["delete"])){

        setcookie("username", "Szabó Péter", time() -3600);
        setcookie("pwd", "12345678", time() -3600);

        echo "Cookie törölve!";

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
        <button type="submit" name="delete">Cookie törlése</button>
    </form>
</body>
</html>