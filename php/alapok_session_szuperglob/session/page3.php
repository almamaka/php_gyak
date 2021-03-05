<?php  session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Munkamenet törlése!</h2>

    <?php

        if(session_destroy()){

            echo "<p style='color: green'>Munkamenet sikeresen törölve!</p>";
        }
        else{

            echo "<p style='color: red'>Munkamenet törlése siketelen!</p>";
        }

    ?>
</body>
</html>