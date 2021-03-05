<?php

    require "calculator.php";

    $count = false;

    if(isset($_POST["osszeadas"])){

        $count = true;

        $szam1 = $_POST["szam1"];
        $szam2 = $_POST["szam2"];

        $calculator = new Calculator($szam1, $szam2);
    }

    $count1 = false;
    if(isset($_POST["kivonas"])){

        $count1 = true;

        $szam1 = $_POST["szam1"];
        $szam2 = $_POST["szam2"];

        $calculator = new Calculator($szam1, $szam2);

    }

    $count2 = false;
    if(isset($_POST["szorzas"])){

        $count2 = true;

        $szam1 = $_POST["szam1"];
        $szam2 = $_POST["szam2"];

        $calculator = new Calculator($szam1, $szam2);

    }

    $count3 = false;
    if(isset($_POST["osztas"])){

        $count3 = true;

        $szam1 = $_POST["szam1"];
        $szam2 = $_POST["szam2"];

        $calculator = new Calculator($szam1, $szam2);

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
        <input type="text" name="szam1" value="<?php if($count) { echo $szam1;}  ?>">
        <input type="text" name="szam2" value="<?php if($count) { echo $szam2;}  ?>">
        <field>=</field>


        <input type="text" name="result" value="
            <?php
                if($count){ 
                    
                echo $calculator->osszeadas();
            }

            if($count1){

                echo $calculator->kivonas();
            }

            if($count2){

                echo $calculator->szorzas();
            }

            if($count3){

                echo $calculator->osztas();
            }

            ?>

        ">







        <br>
        <button type="submit" name="osszeadas">Összeadás</button>
        <button type="submit" name="kivonas">Kivonás</button>
        <button type="submit" name="szorzas">Szorozás</button>
        <button type="submit" name="osztas">Osztás</button>
    </form>
</body>
</html>