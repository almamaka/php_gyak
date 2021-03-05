<?php   session_start();  //Munkamenet elindítása  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Munkamenet változók felvétele és munkamenet kezdete!</h2>

    <?php

        //Munkamenet változók felvétele
        $_SESSION["nev"] = "Szabó Péter";
        $_SESSION["email"] = "szabo.p992@gmail.com";
        $_SESSION["kor"] = "27";

    ?>

    <a href="page2.php">Következő oldal</a>
</body>
</html>