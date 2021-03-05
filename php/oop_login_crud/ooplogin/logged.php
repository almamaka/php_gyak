<?php
    session_start();


    if(isset($_SESSION["logged"])){

        echo $_SESSION["username"];
    }

    if(isset($_POST["logout"])){

        session_destroy();
        header("Location: index.php");
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
        <form method="post">
            <button type="submit" name="logout">Kilépés</button>
        </form>
    </body>
    </html>