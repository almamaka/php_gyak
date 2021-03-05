<?php

    //require "sum1.php";
    require "sum2.php";

    $count = false;

    if(isset($_POST["osszead"])){


        $count = true;
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];

        /*
        $calculator = new Calculator();
        $calculator->setInput1($num1);
        $calculator->setInput2($num2);
        */

        $calculator2 = new Calculator2($num1, $num2);
        

        
    }

    if(isset($_POST["torol"])){

        $_POST["num1"] = "";
        $_POST["num2"] = "";
        $_POST["result"] = "";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP Számológép</title>
</head>
<body>
    <h2>Számológép</h2>

    <form action="" method="post">
        <input type="text" name="num1" value="<?php if($count){echo $num1;} //else{ echo $num1 = 0; }  ?>">
        <field>+</field>

        <input type="text" name="num2" value="<?php  if($count){echo $num2;} //else{ echo $num2 = 0; } ?>">
        <field>=</field>

<input type="text" name="result" value="<?php if($count){ /*echo $calculator->sum();*/ echo $calculator2->osszead();  }  ?>">

        <button type="submit" name="osszead">Összead</button>
        <button type="submit" name="torol">Töröl</button>
    </form>
</body>
</html>